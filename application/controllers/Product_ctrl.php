<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_ctrl extends CI_Controller {

    var $vendor_id;
    var $admin_id;

    public function __construct()
    {
        parent::__construct();
        
        $logged_in = $this->session->userdata('logged_in');
        $vendor = $this->session->userdata('vendor');
        $admin = $this->session->userdata('admin');
        $this->load->library('upload');
        // echo $this->session->userdata('vendor');die();
        // if(!$logged_in && !$vendor){
        //     echo 'not admin 1';die();
        //     redirect('/Welcome');
        // }elseif(!$logged_in && !$admin){
        //     echo 'not admin 2';die();
        //     redirect('/Welcome');
        // }
        // else{
        //     echo 'admin';die();
        //     $this->vendor_id = $this->session->userdata('id');    
        // }
        if($logged_in && $vendor){
            $this->vendor_id = $this->session->userdata('id');
        }elseif($logged_in && $admin){
            $this->admin_id = $this->session->userdata('id');
        }else{
            // echo 'not admin or vendor';die();
            redirect('/Welcome');
        }

        /* 
        ** Image Upload Configuration
        *******************************/
        $config['upload_path']          = './assets/img/product/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 200;
        $config['max_width']            = 1920;
        $config['max_height']           = 1080;
        $config['overwrite']            = FALSE; 
            
        $this->upload->initialize($config);
        

        // /* 
        // ** Image Manipulation Configuration
        // *******************************/        
        // $config['image_library'] = 'gd2';
        // $config['source_image'] = '/path/to/image/mypic.jpg';
        // $config['create_thumb'] = TRUE;
        // $config['maintain_ratio'] = TRUE;
        // $config['width']         = 75;
        // $config['height']       = 50;

        // $this->image_lib->initialize($config);
        


    }


    public function vendor_products()
    { 
        
        $vendor = Vendor::findOrFail($this->vendor_id);
        $products = $vendor->product;
        // echo "<pre>";
        // print_r($products);
        // echo "<pre>";die();
       
        $this->load->view('vendor/product/products', compact('products'));
    }
    public function products()
    { 
        $products = Product::all();
        // echo "<pre>";
        // print_r($products);
        // echo "<pre>";die();
       
        $this->load->view('vendor/product/products', compact('products'));
    }


    public function product_details($product_id)
    {
        // echo "$product_id";die();
        if($this->session->userdata('vendor')){
            $product = Product::where('vendor_id', $this->vendor_id)->where('id', $product_id)->first();
        }elseif($this->session->userdata('admin')){
            $product = Product::where('id', $product_id)->first();
        }
        
        // $collection = $product->product_image->where('featured', 1);
        // dd(count($collection));
        if(!$product)
            redirect('404');
        $this->load->view('vendor/product/product_details', compact('product'));
    }


    public function restock_product($product_id)
    {
        $new = $this->input->post('qt');
        $product = Product::find($product_id);
        
        $product->product_quantity = $product->product_quantity + $new;
        $saved = $product->save();

        if($saved){
            $location = 'product_ctrl/product_details/' . $product_id;
            redirect($location);
        }
        // if ($saved) 
        // {
        //     $this->session->set_flashdata('success', 'Subcategory Updated');
        //     $location = $this->agent->referrer();
        //     redirect($location);  
        //     //redirect('Category_ctrl/get');
        // }
        else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }   
    }


    public function destock_product($product_id){
        $new = $this->input->post('qt');
        $product = Product::find($product_id);
        
        $saved = $product->product_quantity = $product->product_quantity - $new;
        $saved = $product->save();

        if($saved){
            $location = 'product_ctrl/product_details/' . $product_id;
            redirect($location);
        }
        // if ($saved) 
        // {
        //     $this->session->set_flashdata('success', 'Subcategory Updated');
        //     $location = $this->agent->referrer();
        //     redirect($location);  
        //     //redirect('Category_ctrl/get');
        // }
        else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }         
    }

    // Delivers Form with value for editing product information
    public function product_edit_form($product_id)
    {
        if($this->session->userdata('vendor')){
            $product = Product::where('vendor_id', $this->vendor_id)->where('id', $product_id)->first();
            $brands     = Brand::where('vendor_id', $this->vendor_id)->get();
        }elseif($this->session->userdata('admin')){
            $product = Product::where('id', $product_id)->first();
            $vendors = Vendor::all();
            $brands = Brand::all();
        }
        

        if(!$product)
            redirect('404');
        
        $types      = Type::all();
        $cats       = Category::where('root_id',0)->get();
        $subcats    = Subcategory::all();
        
        if($this->session->userdata('vendor')){
            $this->load->view('vendor/product/product_edit', compact('product', 'types', 'cats', 'subcats', 'brands'));
        }elseif($this->session->userdata('admin')){
            $this->load->view('vendor/product/product_edit', compact('product', 'types', 'cats', 'subcats', 'brands','vendors'));
        }
        
        
    }    

    // Process the data submitted from product edit form to update product's information
    public function product_edit_submit($product_id)
    {
        // $a = $this->input->post();
        // echo '<pre>';
        // print_r($a);
        // echo '<pre>';die();
        $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('product_description', 'Product Description', 'trim|required');
        $this->form_validation->set_rules('display_price', 'Price', 'trim|required');
        $this->form_validation->set_rules('currency', 'Currency', 'trim|required');
        $this->form_validation->set_rules('sell_unit', 'Unit', 'trim|required'); 

        $data['product_name'] = $this->input->post('product_name');
        $data['product_description'] = $this->input->post('product_description');
        // $data['type_id'] = $this->input->post('type_id');
        $category_id = $this->input->post('category_id');
        $cat_level_one = $this->input->post('cat_level_one');
        $cat_level_two = $this->input->post('cat_level_two');
        $cat_level_three = $this->input->post('cat_level_three');
         if($category_id && $cat_level_one && $cat_level_two && $cat_level_three){
            $data['category_id'] = $this->input->post('cat_level_three');
        }elseif($category_id && $cat_level_one && $cat_level_two){
            $data['category_id'] = $this->input->post('cat_level_two');
        }elseif($category_id && $cat_level_one){
            $data['category_id'] = $this->input->post('cat_level_one');
        }elseif($category_id){
            $data['category_id'] = $this->input->post('category_id');
        }
        
        // print_r($data['category_id']);die();
        // $data['subcategory_id'] = $this->input->post('subcategory_id'); 
        $data['brand_id'] = $this->input->post('brand_id');
        //$data['product_quantity'] = $this->input->post('product_quantity');
        $data['sell_unit'] = $this->input->post('sell_unit');
        $data['discount'] = $this->input->post('discount');
        $data['currency'] = $this->input->post('currency');
        $data['display_price'] = $this->input->post('display_price');
        if($this->session->userdata('admin')){
            $data['vendor_id'] = $this->input->post('vendor_id');
        }

        // if($data['type_id'] == 1){
        //     $data['sc'] = 1;
        // }
        // else {
        //     $data['sc'] = 0;
        // }

        if ($this->form_validation->run() == FALSE)
        {
            //redirect("product_ctrl/product_edit_form/$product_id");
            //$this->load->view('vendor/product/product_add');
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
         
        }
        else
        {
            $product = Product::find($product_id);

            $product->product_name = $data['product_name'];
            $product->product_description = $data['product_description'];
            //$product->type_id = $data['type_id'];
            $product->category_id = $data['category_id'];
            // $product->subcategory_id = $data['subcategory_id'];
            $product->brand_id = $data['brand_id'];
            //$product->product_quantity = $data['product_quantity'];
            $product->sell_unit = $data['sell_unit'];
            $product->currency = $data['currency'];
            $product->display_price = $data['display_price'];
            $product->discount = $data['discount'];
            //$product->sc = $data['sc'];

            $saved = $product->save();


            if($saved){
                $this->session->set_flashdata('success', 'Update Successful');
                $location = 'product_ctrl/product_details/' . $product_id;
                //print_r($location);
                redirect($location);
            }
                            
        }
    }


    public function product_add_form()
    {
        $types = Type::all();
        $cats  = Category::where('root_id',0)->get();
        // echo "<pre>";
        // print_r($cats);
        // echo "</pre>";die();
        $subcats = Subcategory::all();
        $brands = Brand::where('vendor_id', $this->vendor_id)->get();
        $vendors = Vendor::all();
    
        $this->load->view('vendor/product/product_add', compact('types', 'cats', 'subcats', 'brands','vendors'));

    }    


    public function add_product() 
    {  
        // $a = $this->input->post();
        // echo "<pre>";
        // print_r($a);
        // echo "</pre>";die();
        $this->form_validation->set_rules('product_name', 'Product Name', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('vendor_id','Vendor Select','required');
        $this->form_validation->set_rules('product_description', 'Product Description', 'trim|required');
        $this->form_validation->set_rules('display_price', 'Price', 'trim|required');
        $this->form_validation->set_rules('currency', 'Currency', 'trim|required');
        $this->form_validation->set_rules('sell_unit', 'Unit', 'trim|required');
        $this->form_validation->set_rules('product_quantity', 'Quantity', 'trim'); 

        $data['product_name'] = $this->input->post('product_name');
        $data['product_description'] = $this->input->post('product_description');
        // $data['type_id'] = $this->input->post('type_id');
        $category_id = $this->input->post('category_id');
        $cat_level_one = $this->input->post('cat_level_one');
        $cat_level_two = $this->input->post('cat_level_two');
        $cat_level_three = $this->input->post('cat_level_three');
        if($category_id && $cat_level_one && $cat_level_two && $cat_level_three){
            $data['category_id'] = $this->input->post('cat_level_three');
        }elseif($category_id && $cat_level_one && $cat_level_two){
            $data['category_id'] = $this->input->post('cat_level_two');
        }elseif($category_id && $cat_level_one){
            $data['category_id'] = $this->input->post('cat_level_one');
        }elseif($category_id){
            $data['category_id'] = $this->input->post('category_id');
        }
        
        // print_r($data['category_id']);die();
        
        
        // $data['subcategory_id'] = $this->input->post('subcategory_id'); 
        $data['brand_id'] = $this->input->post('brand_id');
        $data['product_quantity'] = $this->input->post('product_quantity');
        $data['sell_unit'] = $this->input->post('sell_unit');
        $data['currency'] = $this->input->post('currency');
        $data['display_price'] = $this->input->post('display_price');
        $data['discount'] = $this->input->post('discount');

        // if($data['type_id'] == 1)
        // {
        //     $data['product_quantity'] = 0;
        //     $data['sc'] = 1;
        // }
        // else {
        //     $data['product_quantity'] = $this->input->post('product_quantity');
        //     $data['sc'] = 0;
        // }
            


        if ($this->form_validation->run() == FALSE)
        {
            redirect('product_ctrl/product_add_form');
            // $this->load->view('vendor/product/product_add');
        }
        else
        {
            if( ! $this->upload->do_upload('file'))
            {
                //$error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('err', $this->upload->display_errors());
                $location = $this->agent->referrer();
                redirect($location);  
        
            }
            else
            {
                $upload_data = $this->upload->data();
                $file_name = $upload_data['file_name'];

                $this->resizeImage($file_name, 'thumb');
                $this->resizeImage($file_name, 'cart');

                $data['image_name'] = $file_name;
                $data['image_url'] = 'img/product/' . $file_name;

                $product = new Product();
                $product_image = new ProductImage();
                
                if($this->session->userdata('admin') == true){
                    $product->vendor_id = $this->input->post('vendor_id');
                }else{
                    $product->vendor_id = $this->vendor_id;
                }
                
                $product->product_name = $data['product_name'];
                $product->product_description = $data['product_description'];
                $product->img = $file_name;
                $product->category_id = $data['category_id'];
                // $product->subcategory_id = $data['subcategory_id'];
                $product->brand_id = $data['brand_id'];
                $product->product_quantity = $data['product_quantity'];
                $product->sell_unit = $data['sell_unit'];
                $product->currency = $data['currency'];
                $product->display_price = $data['display_price'];
                $product->discount = $data['discount'];
                // $product->sc = $data['sc'];
                $product->save();
                $product_id = $product->id;
                $product_image->product_id = $product_id;
                $product_image->image_url = $data['image_url'];
                // Default Product Image is Featured Image
                $product_image->featured_image = 1;
                $product_image->save();

                // if($product && $product_image){
                //     $location = 'product_ctrl/product_details/' . $product_id;
                //     redirect($location);
                // }
                
                
                if ($product && $product_image) 
                {
                    $this->session->set_flashdata('success', 'Product Added');
                    //$location = $this->agent->referrer();
                    $location = 'product_ctrl/product_details/' . $product_id;
                    redirect($location);  
                    //redirect('Category_ctrl/get');
                }
                else {
                    $this->session->set_flashdata('err', 'Something Went Wrong');
                    $location = $this->agent->referrer();
                    redirect($location);  
                }                   


            }                
        }
    }


    public function edit_product_size_color() 
    {
        $newSize =  $this->input->post('size');
        $newColor = $this->input->post('color');
        $newQt = $this->input->post('qt');
        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id');

        $size_color = SizeColor::find($id);

        $size_color->size = $newSize;
        $size_color->color = $newColor;
        $size_color->qt = $newQt;

        $saved = $size_color->save();
        //print_r($size_color->qt);
        if($saved){
            $this->session->set_flashdata('success', 'Size & Color variation updated');
            $location = 'product_ctrl/product_details/' . $product_id;
            redirect($location);
        }
        else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }   
    }


    public function restock_product_variation()
    {
        $newQt = $this->input->post('qt');
        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id');

        $size_color = SizeColor::find($id);

        
        $size_color->qt = $size_color->qt + $newQt;

        $saved = $size_color->save();
        //print_r($size_color->qt);
        if($saved){
            $this->session->set_flashdata('success', 'Variation Stock Updated');
            $location = 'product_ctrl/product_details/' . $product_id;
            redirect($location);
        }
        else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }
    }


    public function destock_product_variation()
    {
        $newQt = $this->input->post('qt');
        $id = $this->input->post('id');
        $product_id = $this->input->post('product_id');

        $size_color = SizeColor::find($id);

        
        $size_color->qt = $size_color->qt - $newQt;

        $saved = $size_color->save();
        //print_r($size_color->qt);
        if($saved){
            $this->session->set_flashdata('success', 'Variation Stock Updated');
            $location = 'product_ctrl/product_details/' . $product_id;
            redirect($location);
        }
        else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }
    }


    public function add_product_size_color()
    {
        $product_id = $this->input->post('product_id');
        $size = $this->input->post('size');
        $color = $this->input->post('color');
        $quantity = $this->input->post('qt');

        //echo $size, $color, $quantity ; die();

        $size_color = new SizeColor();
        $size_color->product_id = $product_id;
        $size_color->size = $size;
        $size_color->color = $color;
        $size_color->qt = $quantity;

        $saved = $size_color->save();

        if($saved){
            $this->session->set_flashdata('success', 'Variation Size & Color Added');
            $location = 'product_ctrl/product_details/' . $product_id;
            redirect($location);
        }
        else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }
    }


    public function add_product_image()
    {
        $product_id = $this->input->post('product_id');
        $featured = $this->input->post('featured');

        if($featured == 'on'){
            $data['featured'] = 1;
        }
        else{
            $data['featured'] = 0;
        }
            
        // $config['upload_path']          = './assets/img/product/';
        // $config['allowed_types']        = 'gif|jpg|png|jpeg';
        // $config['max_size']             = 200;
        // $config['max_width']            = 2000;
        // $config['max_height']           = 2000;
        // $config['overwrite']            = FALSE;

        // $this->upload->initialize($config);

        if ( ! $this->upload->do_upload('image-file'))
        {
            //$error = array('error' => $this->upload->display_errors());
            // print_r($error); die();
            
            $this->session->set_flashdata('err', $this->upload->display_errors());
            $location = $this->agent->referrer();
            redirect($location);  
            
            
        }
        else{

            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            if($featured == 'on')
            {
                $make_thumb = $this->resizeImage($file_name, 'thumb');
                $make_cart = $this->resizeImage($file_name, 'cart');
    
                // if($make_cart == 0 || $make_thumb == 0){
                //     unlink(FCPATH.'assets/img/product/'.$file_name); 
                //     $this->session->set_flashdata('err', 'No Resize');
                //     $location = $this->agent->referrer();
                //     redirect($location);                 
                // }
            }


    
            $data['image_name'] = $file_name;
            $data['image_url'] = 'img/product/' . $file_name;
    
            $product_image = new ProductImage();
            $product_image->product_id = $product_id;
            $product_image->image_url = $data['image_url'];
            $product_image->featured_image = $data['featured'];
    
            $product_image->save();
    
            if($product_image){
                $this->session->set_flashdata('success', 'Image Added');
                $location = 'product_ctrl/product_details/' . $product_id;
                redirect($location);
            }
            else {
                $this->session->set_flashdata('err', 'Something Went Wrong');
                $location = $this->agent->referrer();
                redirect($location);  
            } 

        }

       
    }


    public function delete_product_image($image_id)
    {
        $image = ProductImage::find($image_id);
        $featured = $image->featured_image;
        $imageURL = $image->image_url;            
        $imageURL = str_replace("img/product/", "", $imageURL);

        //print_r($imageURL); die();

        $imageGone = $image->delete();

        $fileGone_main = unlink(FCPATH.'assets/img/product/'.$imageURL);

        if($featured){
            $fileGone_thumb = unlink(FCPATH.'assets/img/product/thumb/'.$imageURL);
            $fileGone_cart = unlink(FCPATH.'assets/img/product/cart/'.$imageURL);
        }


        $product_id = $image->product->id;
        if($imageGone && $fileGone_main && $fileGone_thumb && $fileGone_cart){
            $this->session->set_flashdata('success', 'Image Deleted Successfully');
            $location = 'product_ctrl/product_details/' . $product_id;
            redirect($location);
        }
        else {
            $this->session->set_flashdata('err', 'Something Went Wrong');
            $location = $this->agent->referrer();
            redirect($location);  
        }        
    }


    public function resizeImage($filename, $for)
    {

       //$for = 'thumb' or 'cart';

       $source_path = FCPATH . 'assets/img/product/' . $filename ;
       $target_path = './assets/img/product/' . $for . '/';

       //dd($source_path, $target_path);



       $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'create_thumb' => TRUE,
            'thumb_marker' => '',
            'width' => 420,
            'height' => 420
        );

       if($for == 'cart'){
            $config_manip['width'] = 100;
            $config_manip['height'] = 100;
       }
 
 
       $this->image_lib->initialize($config_manip);

       if (!$this->image_lib->resize()) {
        //    echo $this->image_lib->display_errors();
        //    echo $source_path;
        //    echo $target_path;
        //    die();
        //    $this->session->set_flashdata('err', $this->image_lib->display_errors());
        //    $location = $this->agent->referrer();
        //    redirect($location);
        
        return 0;
       }
 
 
       //$this->image_lib->clear();
    }    
    
    
    public function getBrands($vendor_id){
        $brands = Brand::where('vendor_id',$vendor_id)->get();
        echo json_encode($brands);
    }
    
    public function getCategories($cat_id){
        $categories = Category::where('root_id',$cat_id)->get();
        echo json_encode($categories);
    }



}