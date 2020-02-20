<?php $this->load->view('client/layouts/header.php'); ?>
    <div class="page_head">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h2>Create an Account</h2>
                        </div>
                </div>
        </div>
    </div>

    <div class="content_page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Personal Details</h3>
                    <p>Enter your email address and password to create your account.</p>

                    <form class="form-horizontal" action="<?= base_url('client_controllers/main_ctrl/registration') ?>" method="post">
                        <fieldset>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="user_name"><p>User Name</p></label>
                                <div class="col-md-5">
                                    <input id="user_name" name="user_name" type="text" class="form-control input-md" required="">

                                </div>
                            </div>
                           

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="password"><p>Password</p></label>
                                <div class="col-md-5">
                                    <input id="password" name="password" type="password" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Password input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="c_password"><p>Confirm Password</p></label>
                                <div class="col-md-5">
                                    <input id="c_password" name="c_password" type="password" class="form-control input-md" required="">

                                </div>
                            </div>

                            <h3>Shipping Details</h3>
                            <p>Enter the name and address you'd like us to ship your order to.</p>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="full_name"><p>Full Name</p></label>
                                <div class="col-md-5">
                                    <input id="full_name" name="full_name" type="text" class="form-control input-md" >

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="email"><p>Email Address</p></label>
                                <div class="col-md-5">
                                    <input id="email" name="email" type="email" class="form-control input-md" >

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="contact_no"><p>Contact No</p></label>
                                <div class="col-md-5">
                                    <input id="contact_no" name="contact_no" type="text" class="form-control input-md" required="">

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="national_id"><p>National ID</p></label>
                                <div class="col-md-5">
                                    <input id="national_id" name="national_id" type="text" class="form-control input-md" >

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="present_address"><p>Present Address</p></label>
                                <div class="col-md-5">
                                    <input id="present_address" name="present_address" type="text" class="form-control input-md" >

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="permanent_address"><p>Permanent Address</p></label>
                                <div class="col-md-5">
                                    <input id="permanent_address" name="permanent_address" type="text" class="form-control input-md" >

                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="holding_no"><p>Holding_no</p></label>
                                <div class="col-md-5">
                                    <input id="holding_no" name="holding_no" type="text" class="form-control input-md" >

                                </div>
                            </div>

                            <!-- <div class="form-group">
                                <label class="col-md-4 control-label" for="selectbasic"><p>Country</p></label>
                                <div class="col-md-5">
                                    <select id="selectbasic" name="selectbasic" class="form-control">
                                        <option value="5" selected="">Select One</option>
                                        <option value="7">Afghanistan</option>
                                        <option value="8">Albania</option>
                                        <option value="9">Algeria</option>
                                        <option value="10">American Samoa</option>
                                        <option value="11">Andorra</option>
                                        <option value="12">Angola</option>
                                        <option value="13">Argentina</option>
                                        <option value="14">Armenia</option>
                                        <option value="15">Aruba</option>
                                        <option value="16">Ascension</option>
                                        <option value="17">Australia</option>
                                        <option value="18">Australian Ext. Territory</option>
                                        <option value="19">Austria</option>
                                        <option value="20">Azerbaijan</option>
                                        <option value="21">Bahrain</option>
                                        <option value="22">Bangladesh</option>
                                        <option value="23">Belarus</option>
                                        <option value="24">Belgium</option>
                                        <option value="25">Belize</option>
                                        <option value="26">Benin</option>
                                        <option value="27">Bhutan</option>
                                        <option value="28">Bolivia</option>
                                        <option value="29">Bosnia</option>
                                        <option value="30">Botswana</option>
                                        <option value="31">Brazil</option>
                                        <option value="32">Brunei Darussalam</option>
                                        <option value="33">Bulgaria</option>
                                        <option value="34">Burkina Faso</option>
                                        <option value="35">Burundi</option>
                                        <option value="36">Cambodia</option>
                                        <option value="37">Cameroon</option>
                                        <option value="38">Canada</option>
                                        <option value="39">Cape Verde</option>
                                        <option value="40">Central African Republic</option>
                                        <option value="41">Chad</option>
                                        <option value="42">Chile</option>
                                        <option value="43">China</option>
                                        <option value="44">Colombia</option>
                                        <option value="45">Congo</option>
                                        <option value="46">Cook Islands</option>
                                        <option value="47">Costa Rica</option>
                                        <option value="48">Croatia</option>
                                        <option value="49">Cuba</option>
                                        <option value="50">Cyprus</option>
                                        <option value="51">Czech Republic</option>
                                        <option value="52">Denmark</option>
                                        <option value="53">Diego Garcia</option>
                                        <option value="54">Djibouti</option>
                                        <option value="55">Dominican Republic</option>
                                        <option value="56">DPR Korea (North)</option>
                                        <option value="57">East Timor</option>
                                        <option value="58">Ecuador</option>
                                        <option value="59">Egypt</option>
                                        <option value="60">El Salvador</option>
                                        <option value="61">Equatorial Guinea</option>
                                        <option value="62">Eritrea</option>
                                        <option value="63">Estonia</option>
                                        <option value="64">Ethiopia</option>
                                        <option value="65">F.S. Micronesia</option>
                                        <option value="66">Falkland Islands</option>
                                        <option value="67">Faroe Islands</option>
                                        <option value="68">Fiji</option>
                                        <option value="69">Finland</option>
                                        <option value="70">France</option>
                                        <option value="71">French Polynesia</option>
                                        <option value="72">Gabon</option>
                                        <option value="73">Gambia</option>
                                        <option value="74">Georgia</option>
                                        <option value="75">Germany</option>
                                        <option value="76">Ghana</option>
                                        <option value="77">Gibraltar</option>
                                        <option value="78">Greece</option>
                                        <option value="79">Greenland</option>
                                        <option value="80">Guadeloupe</option>
                                        <option value="81">Guatemala</option>
                                        <option value="82">Guiana (French)</option>
                                        <option value="83">Guinea</option>
                                        <option value="84">Guinea-Bissau</option>
                                        <option value="85">Guyana</option>
                                        <option value="86">Haiti</option>
                                        <option value="87">Honduras</option>
                                        <option value="88">Hong Kong</option>
                                        <option value="89">Hungary</option>
                                        <option value="90">Iceland</option>
                                        <option value="5">India</option>
                                        <option value="92">Indonesia</option>
                                        <option value="93">Iran</option>
                                        <option value="94">Iraq</option>
                                        <option value="95">Ireland</option>
                                        <option value="96">Israel</option>
                                        <option value="97">Italy</option>
                                        <option value="98">Ivory Coast</option>
                                        <option value="99">Jamaica</option>
                                        <option value="100">Japan</option>
                                        <option value="101">Jordan</option>
                                        <option value="102">Kazakhstan</option>
                                        <option value="103">Kenya</option>
                                        <option value="104">Kiribati</option>
                                        <option value="105">Korea (South)</option>
                                        <option value="106">Kuwait</option>
                                        <option value="107">Kyrgyz Republic</option>
                                        <option value="108">Laos</option>
                                        <option value="109">Latvia</option>
                                        <option value="110">Lebanon</option>
                                        <option value="111">Lesotho</option>
                                        <option value="112">Liberia</option>
                                        <option value="113">Libya</option>
                                        <option value="114">Liechtenstein</option>
                                        <option value="115">Lithuania</option>
                                        <option value="116">Luxembourg</option>
                                        <option value="117">Macau</option>
                                        <option value="118">Macedonia</option>
                                        <option value="119">Madagascar</option>
                                        <option value="120">Malawi</option>
                                        <option value="121">Malaysia</option>
                                        <option value="122">Maldives</option>
                                        <option value="123">Mali</option>
                                        <option value="124">Malta</option>
                                        <option value="125">Marshall Islands</option>
                                        <option value="126">Martinique</option>
                                        <option value="127">Mauritania</option>
                                        <option value="128">Mauritius</option>
                                        <option value="129">Mayotte, Comoros Is.</option>
                                        <option value="130">Mexico</option>
                                        <option value="131">Moldova</option>
                                        <option value="132">Monaco</option>
                                        <option value="133">Mongolia</option>
                                        <option value="134">Morocco</option>
                                        <option value="135">Mozambique</option>
                                        <option value="136">Myanmar (Burma)</option>
                                        <option value="137">Namibia</option>
                                        <option value="138">Nauru</option>
                                        <option value="139">Nepal</option>
                                        <option value="140">Netherlands</option>
                                        <option value="141">Netherlands Antilles</option>
                                        <option value="142">New Caledonia</option>
                                        <option value="143">New Zealand</option>
                                        <option value="144">Nicaragua</option>
                                        <option value="145">Niger</option>
                                        <option value="146">Nigeria</option>
                                        <option value="147">Niue</option>
                                        <option value="148">Norway</option>
                                        <option value="149">Oman</option>
                                        <option value="150">Pakistan</option>
                                        <option value="151">Palau</option>
                                        <option value="152">Palestine</option>
                                        <option value="153">Panama</option>
                                        <option value="154">Papua New Guinea</option>
                                        <option value="155">Paraguay</option>
                                        <option value="156">Peru</option>
                                        <option value="157">Philippines</option>
                                        <option value="158">Poland</option>
                                        <option value="159">Portugal</option>
                                        <option value="160">Qatar</option>
                                        <option value="161">Reunion Island</option>
                                        <option value="162">Romania</option>
                                        <option value="163">Russia</option>
                                        <option value="164">Rwanda</option>
                                        <option value="165">Saint Helena</option>
                                        <option value="166">San Marino</option>
                                        <option value="167">Sao Tome &amp; Principe</option>
                                        <option value="168">Saudi Arabia</option>
                                        <option value="214">Schotland</option>
                                        <option value="169">Senegal</option>
                                        <option value="170">Seychelles</option>
                                        <option value="171">Sierra Leone</option>
                                        <option value="172">Singapore</option>
                                        <option value="173">Slovakia</option>
                                        <option value="174">Slovenia</option>
                                        <option value="175">Solomon Islands</option>
                                        <option value="176">Somalia</option>
                                        <option value="177">South Africa</option>
                                        <option value="178">Spain</option>
                                        <option value="179">Sri Lanka</option>
                                        <option value="180">St Pierre &amp; Miquelon</option>
                                        <option value="181">Sudan</option>
                                        <option value="182">Suriname</option>
                                        <option value="183">Swaziland</option>
                                        <option value="184">Sweden</option>
                                        <option value="185">Switzerland</option>
                                        <option value="186">Syria</option>
                                        <option value="187">Taiwan</option>
                                        <option value="188">Tajikistan</option>
                                        <option value="189">Tanzania</option>
                                        <option value="190">Thailand</option>
                                        <option value="191">Togo</option>
                                        <option value="192">Tokelau</option>
                                        <option value="193">Tonga</option>
                                        <option value="194">Tunisia</option>
                                        <option value="195">Turkey</option>
                                        <option value="196">Turkmenistan</option>
                                        <option value="197">Tuvalu</option>
                                        <option value="198">Uganda</option>
                                        <option value="199">Ukraine</option>
                                        <option value="200">United Arab Emirates</option>
                                        <option value="201">United Kingdom</option>
                                        <option value="3">United States</option>
                                        <option value="202">Uruguay</option>
                                        <option value="203">Uzbekistan</option>
                                        <option value="204">Vanuatu</option>
                                        <option value="205">Vatican City</option>
                                        <option value="206">Venezuela</option>
                                        <option value="207">Vietnam</option>
                                        <option value="208">Wallis and Futuna</option>
                                        <option value="209">Western Samoa</option>
                                        <option value="210">Yemen</option>
                                        <option value="211">Yugoslavia</option>
                                        <option value="212">Zambia</option>
                                        <option value="213">Zimbabwe</option>
                                    </select>
                                </div>
                            </div> -->
                            <!-- Text input-->
                            <!-- <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput"><p>State/Province</p></label>
                                <div class="col-md-5">
                                    <input id="textinput" name="textinput" type="text" class="form-control input-md" required="">

                                </div>
                            </div> -->

                            <!-- Text input-->
                            <!-- <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput"><p>Zip/Postcode</p></label>
                                <div class="col-md-5">
                                    <input id="textinput" name="textinput" type="text" class="form-control input-md" required="">

                                </div>
                            </div> -->

                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="singlebutton"></label>
                                <div class="col-md-4">
                                    <button id="singlebutton" class="btn btn-success cl-btn">Create Account</button>
                                </div>
                            </div>

                        </fieldset>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('client/layouts/footer.php'); ?>