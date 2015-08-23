@extends('layouts.core')
@section('content')
<div class="boxx">
	<div class="row">
		<div id="tab-container">
			<ul class="wizard-tab">
				<li tabID="1" name="wizardT-1" id="WT-1" class="active">Login/Register</li>
				<li tabID="2" name="wizardT-2" id="WT-2"  class="CNext">Your ad</li>
				<li tabID="3"name="wizardT-3" id="WT-3"  class="CNext">Address Confirmation</li>
				<li tabID="4" name="wizardT-4" id="WT-4"  class="CNext">Overview</li>
			</ul>
		</div>
		<div id="tab-content">
			<div id="wizardT-1" class="CDisplay"> 
				<div class="login">
					<div class="w-log">
						<div class="w-log-sec-1" >
							<div class="wlg-sub1-sec1" >Login</div>
							<div class="gl-contain-60-c"><span class="g-logo-contain gl-contain-60" ></span></div>
						</div>
						<div class="w-log-sec-2" >
							<div>
								<input type="text" class="cust-input-block unTabUp" placeholder="Your email" id="auth-email"/>
								<div class="pn-popup"></div>
							</div>
							<div>
								<input type="password" class="cust-input-block unTab" placeholder="Password" id="auth-password" />
								<div class="pn-popup"></div>
							</div>
							<div class="regbtnOuter">Dont have an account? <span class="b-fakeLink regbtn">Register</span></div>
						</div>
						<div class="w-log-sec-3" >
                            <a class="backbtn cust-btn -btn-back" btnId="1" href="{{ url('/') }}" >Back</a>
							<div class="cust-btn -btn-next" id="login-btn" btnId="1" >Login</div>
						</div>
					</div>
					<div class="w-reg">
						<div class="w-reg-1">
							<div class="w-reg-sec-1" >
								<span  class="w-reg-head"  >Register with </span><div ><span class="g-logo-contain gl-contain-60" ></span></div>
							</div>
							<div class="w-reg-sec-2" >
                                <div>
								    <input type="text" class="cust-input-block unTabUp" placeholder="Your email" id="register-email"/>
                                    <div class="pn-popup"></div>
                                </div>
                                <div>
								    <input type="password" class="cust-input-block" placeholder="Password" id="register-password"/>
                                    <div class="pn-popup"></div>
                                </div>
                                <div>
                                    <input type="password" class="cust-input-block unTab" placeholder="Confirm Password" id="register-password-confirm"/>
                                    <div class="pn-popup"></div>
                                </div>
								<div class="w-reg-sec2-text">Already have an account? <span class="b-fakeLink logbtn" > Login </span></div>
							</div>
							<div class="w-reg-sec-3" >
								<a class="backbtn cust-btn -btn-back" btnId="1" href="{{ url('/')  }}" >Back</a>
								<div class="cust-btn -btn-next" id="register-btn" btnId="1" >Register</div>
							</div>	
						</div>	
						<div class="w-reg-2">
							<img src="{{ asset('img/extras/mail.png') }}"/>
							<div>Register with Email and Recieve latest Offers from GlobexKart.com</div>
						</div>
					</div>
				</div> 
				<div class="loggedin">
					<div class="lgin-sec-1">
						<span>GLOBEXCART</span>
					</div> 
					<div class="lgin-sec-2">
						You are already logged in. want to login </br>from different account ?
					</div> 
					<div class="lgin-sec-3">
						<div class="loginbtn cust-btn -btn-back" btnId="1" id="logoutBtn">Login from another account</div>
						<div class="nextbtn cust-btn -btn-next" btnId="1" >Proceed</div>
					</div> 
				</div>
			</div>
			<div id="wizardT-2">
				<div class="w2-sec1" >
					<div class="w2-labOuter" >
						<div class="w2-inp-label" >Title</div>
						<div class="w2-inp-label w2-inp-label-t" >Description </div>
						<div class="w2-inp-label " >Category</div>
						<div class="selcatPathDummy" ></div>
						<div class="w2-inp-label" >Price</div>
						
					</div>
					<div class="w2-inp" >
                        <div>
                            <input type="text" name="adtitle" placeholder="Ad Title" class="cust-input w2-inp-f in-larg" id="adTitle" />
                            <div class="pn-popup"></div>
                        </div>
                        <div>
                            <textarea name="description" placeholder="Description about your ad" class="cust-input w2-inp-t in-larg" id="adDesc"></textarea>
                            <div class="pn-popup"></div>
                        </div>
                        <div>
                            <div class="selCat1sec" id="adCatSel"><div id="selCat1" class="cust-input w2-inp-btn addCat in-small" >Select a category</div></div>
                            <div class="pn-popup"></div>
                        </div>
						<div class="selCat2sec">
							<div class="selcatPath w2-inp-f in-larg"></div>
							<div id="selCat2" class=" cust-input w2-inp-btn addCat in-exsmall" >change</div>
						</div>
                        <div class="selCatOuter">
                            <div class="overlay selcat-obbtn"> </div>
                            <div class="selCatPop">
                                <div class="selCatPopHead">
                                    <div class="selCatPopTitle"> Select a Category </div>
                                    <div class="selCatPopBackBtn selCatPopBackBtn-inact"> Back </div>
                                </div>
                                <div class="selCatPopCont">
                                    <?php $i = 1; ?>
                                    <div class="sc-frame ">
                                        @foreach($categories as $cat)
                                            <div class="setcat-cat" idbase="scf{{ $i }}">
                                                {{ $cat->name }}
                                                <?php $i++; ?>
                                            </div>
                                        @endforeach
                                    </div>
                                    <?php $i = 1; $j = 1; ?>
                                    @foreach($categories as $cat)
                                        <div class="sc-sub-frame scf{{ $i }}">
                                            @foreach($cat->children->all() as $subcat)
                                                <div class="setcat-subCat" idbase="scf{{ $i }}sub{{ $j }}">
                                                    {{ $subcat->name }}
                                                </div>
                                                <?php $j++; ?>
                                            @endforeach
                                        </div>
                                        <?php $i++; $j = 1; ?>
                                    @endforeach
                                    <?php $i = 1; $j = 1; $k = 1;?>
                                    @foreach($categories as $cat)
                                        @foreach($cat->children->all() as $subcat)
                                            <div class="sc-post-frame scf{{ $i }}sub{{ $j }}">
                                                @foreach($subcat->children->all() as $postcat)
                                                    <div class="setcat-postCat" catid="{{$i}}" subcatid="{{$j}}" postcatid="{{$k}}" databaseid="{{ $postcat->id }}">{{ $postcat->name }}</div>
                                                    <?php $k++; ?>
                                                @endforeach
                                            </div>
                                            <?php $j++; $k = 1; ?>
                                        @endforeach
                                        <?php $i++; $j = 1;  ?>
                                    @endforeach
                                    <input type="hidden" id="adCatId" valeu="" name="category_id"/>
                                </div>
                            </div>
                        </div>
                        <div>
                            <input type="text" name="price" placeholder="Price" class="cust-input w2-inp-f in-larg pnNumber" id="adPrice"/>
                            <div class="pn-popup"></div>
                        </div>
                        <div id="dropView">
                            {!! Form::open(['route' => 'resellerimages.store', 'class' => 'dropzone', 'id' => 'globex-drop-view']) !!}
                                <div class="dz-message">
                                    Click here to upload image
                                </div>
                            {!! Form::close() !!}
                        </div>

					</div>
                    <div class="w2Extra">
                        <div class=" w2table ">
                            <div class="w2row">
                                <div class="w2cell1">
                                    <div> Model </div>
                                </div>
                                <div class="w2cell2">
                                    <input type="text" name="model" placeholder="Model" class="cust-input w2-inp-f in-larg " id="adModel"/>
                                </div>
                            </div>
                            <div class="w2row">
                                <div class="w2cell1">
                                    <div> Chassis no: </div>
                                </div>
                                <div class="w2cell2">
                                    <input type="text" name="chassis_no" placeholder="Chassis number" class="cust-input w2-inp-f in-larg" id="adChassis"/>
                                </div>
                            </div>
                            <div class="w2row">
                                <div class="w2cell1">
                                    <div> Color </div>
                                </div>
                                <div class="w2cell2">
                                    <input type="text" name="color" placeholder="Color" class="cust-input w2-inp-f in-larg" id="adColor"/>
                                </div>
                            </div>
                            <div class="w2row">
                                <div class="w2cell1">
                                    <div> Doors </div>
                                </div>
                                <div class="w2cell2">
                                    <input type="text" name="doors" placeholder="Doors" class="cust-input w2-inp-f in-larg" id="adDoors"/>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="w2-sec2" >
					<div class="w2-sec1-1" >
						
					</div>
				</div>
				<div class="w2-sec3" >
					<div btnId="2" id="w2nBtn" class="nextbtn cust-btn -btn-next -btnDis" >Next</div>
					<div class="backbtn cust-btn -btn-back" btnId="2" >Back</div>
				</div>
			</div>
			<div id="wizardT-3" class="wizardT-3"> 
				<div class="w2-sec1" >
					<div class="w2-labOuter" >
						<div class="w2-inp-label" >Name</div>
						<div class="w2-inp-label" >PIN</div>
						<div class="w2-inp-label w2-inp-label-t" >Address</div>
						<div class="w2-inp-label" >Emirate</div>
						<div class="w2-inp-label" >Phone</div>
					</div>
					<div class="w2-inp" >
                        <div>
                            <input type="text" class="cust-input w2-inp-f inp-type-inline" placeholder="Your name" name="name" id="customerName" />
                            <div class="pn-popup"></div>
                        </div>
                        <div>
						    <input type="text" class="cust-input w2-inp-f pnNumber inp-type-inline" placeholder="PIN" name="pin" id="customerPin"/>
                            <div class="pn-popup "></div>
                        </div>
                        <div>
						    <textarea type="text" class="cust-input w2-inp-t inp-type-inline" placeholder="Your address" name="address" id="customerAddress"></textarea>
                            <div class="pn-popup"></div>
                        </div>
                        <div>
                            <select type="text" class="cust-input w2-inp-f inp-type-inline" placeholder="Your city" name="city" id="customerCity">
                            @foreach($emirates as $emirate)
                                <option value="{{ $emirate->id }}">{{ $emirate->name }}</option>
                            @endforeach
                            </select>
                            <div class="pn-popup"></div>
                        </div>
                        <div>
                            <input type="text" class="cust-input w2-inp-f pnNumber inp-type-inline" placeholder="Your phone number" name="phone" id="customerPhone"/>
                            <div class="pn-popup"></div>
                        </div>
					</div>
				</div>
				<div class="w2-sec2" >
					<div class="w2-sec1-1" >
						
					</div>
					<div class="w2-sec1-2" >
						<button class=" backbtn cust-btn -btn-back" btnId="3" >Back</button>
						<button class=" nextbtn cust-btn -btn-next  -btnDis" id="w3nBtn" btnId="3">Next</button>
					</div>
				</div>
			</div>
			<div id="wizardT-4"> 
				<div id="w4-4" class=" w4-tab-c">
					<div class="w4-c-sec-1"> 
					</div>
					<div class="w4-c-sec-2"> 
						<span class="w4-c-sec-4">One step away from Posting the Ad...! </span>
                        <div class="AdSummery">
                            <div class="adSR">
                                <table>
                                    <tr>
                                        <th class="tdSName" colspan="2" >
                                            Ad Details
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            Ad Title
                                        </td>
                                        <td class="AdTitle-S tdS2">
                                            Ad Title
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            Description
                                        </td>
                                        <td class="AdDesc-S tdS2 b-fullText">
                                            Description
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            Category
                                        </td>
                                        <td class="AdCat-S tdS2">
                                            Category
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            Price
                                        </td>
                                        <td class="AdPrice-S tdS2">
                                            Price
                                        </td>
                                    </tr>

                                    <!-- The Extra table -->

                                    <tr class="w2Extra">
                                        <th class="tdSName" colspan="2" >
                                            Extra Motor Details
                                        </th>
                                    </tr>
                                    <tr class="w2Extra">
                                        <td class="tdS1">
                                            Model
                                        </td>
                                        <td class="AdEModel-S tdS2">
                                            Model
                                        </td>
                                    </tr>
                                    <tr class="w2Extra">
                                        <td class="tdS1">
                                            Chassis Number
                                        </td>
                                        <td class="AdEChassis-S tdS2">
                                            Chassis number
                                        </td>
                                    </tr>
                                    <tr class="w2Extra">
                                        <td class="tdS1">
                                            Color
                                        </td>
                                        <td class="AdEColor-S tdS2">
                                            Color
                                        </td>
                                    </tr>
                                    <tr class="w2Extra">
                                        <td class="tdS1">
                                            Doors
                                        </td>
                                        <td class="AdEDoors-S tdS2">
                                            Doors
                                        </td>
                                    </tr>


                                    <!-- The Extra table  Ends -->

                                    <tr>
                                        <th class="tdSName" colspan="2" >
                                            Personal Details
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            Name
                                        </td>
                                        <td class="AdName-S tdS2">
                                            name
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            PIN
                                        </td>
                                        <td class="AdPin-S tdS2">
                                            pin
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            Address
                                        </td>
                                        <td class="AdAddress-S tdS2 b-fullText">
                                            Address
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            City
                                        </td>
                                        <td class="AdCity-S tdS2">
                                            City
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdS1">
                                            Phone Number
                                        </td>
                                        <td class="AdPhNumber-S tdS2">
                                            Phone Number
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
					</div>
					<div class="w4-c-sec-3"> 
						<div btnId="4" class="cust-btn -btn-next" id="post_ad">Post ad</div>
						<div class="backbtn cust-btn -btn-back" btnId="4" >Back</div>
						<span>By posting the ad i have read and agreed to Globexcart.com Terms of use and Temrs od Sale</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop