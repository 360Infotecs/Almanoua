<script>
													function checkPass1(){
														//Store the password field objects into variables ...
														var pass11 = document.getElementById('pass11');
														var pass22 = document.getElementById('pass22');
														//Store the Confimation Message Object ...
														var message = document.getElementById('confirmMessage');
														//Set the colors we will be using ...
														var goodColor = "#66cc66";
														var badColor = "#ff6666";
														//Compare the values in the password field 
														//and the confirmation field
														if(pass11.value == pass22.value){
															//The passwords match. 
															//Set the color to the good color and inform
															//the user that they have entered the correct password 
															pass22.style.backgroundColor = goodColor;
															message.style.color = goodColor;
															message.innerHTML = "Passwords correct!"
														}else{
															//The passwords do not match.
															//Set the color to the bad color and
															//notify the user.									
															pass22.style.backgroundColor = badColor;
															message.style.color = badColor;
															message.innerHTML = "Passwords wrong!"
														}
													}  
												</script>
												<label>Password <span class="color-red">*</span></label>
												<input type="password" name="iu_password" id="pass11" pattern=".{6,}" placeholder="Enter Minimum 6 Characters" title="Six or more characters" class="form-control margin-bottom-20" required><!--class="form-control margin-bottom-20"-->
											</div>
											<div class="col-sm-6">
												<label>Confirm Password <span class="color-red">*</span></label>
												<input type="password" name="iu_confirmpassword" id="pass22" class="form-control margin-bottom-20" onkeyup="checkPass1(); return false;"><!--class="form-control margin-bottom-20"-->
												<span id="confirmMessage"></span>
											</div>