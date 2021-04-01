require('./bootstrap');





$( document ).ready( function() {



	



	function appendZeros( prefix, inputNum ){



		let a = inputNum.toString().length,

			b = '';



		switch(a) {

		 	case 1:

		  		b = prefix+'00000'+inputNum;

		  	break;

		 	case 2:

		  		b = prefix+'0000'+inputNum;

		  	break;

		  	case 3:

		  		b = prefix+'000'+inputNum;

		  	break;

		  	case 4:

		  		b = prefix+'00'+inputNum;

		  	break;

		  	case 5:

		  		b = prefix+'0'+inputNum;

		  	break;

		 	default:

		 	// code to be executed if n is different from case 1 and 2

		}



		return b;



	}



	let errorMsg = $('.invalid-feedback').find('strong').html();

	

	if ($.trim(errorMsg).length > 0) {

		$('.nav-login').trigger('click');

	}



	$('.btn-race-result-tab').on('click', function(event) {

		event.preventDefault();



		$('.btn-race-result-tab').removeClass('active');

		$(this).addClass('active');



		var targetAction = $(this).attr('target-section');



		if (targetAction == 'previous-accordion') {

			$('.full-prog-header').html('').html('race result');

			$('.accord-sect').hide();

			$('.previous-accordion').show();

		}else{

			$('.full-prog-header').html('').html('full race program');

			$('.accord-sect').hide();

			$('.row-race-accordion').show();

		}

	});



	$('.nav-login').on('click', function(event) {

		event.preventDefault();

		$('.modal').modal('hide') 

	});



	$('.nav-register').on('click', function(event) {

		event.preventDefault();

		$('.modal').modal('hide') 

	});



	$('.month').on('click', function(event) {

		event.preventDefault();

		alert();

	});



	

	$('.select-horse-season').on('change', function(event) {

		event.preventDefault();

		var table = $('#horseTable tbody');



		$.ajax({

			url: 'horsesearch',

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	targetYear: $(this).val(),

				_token: $('meta[name="csrf-token"]').attr('content')},

		})

		.done(function (response) {

			table.empty();

			console.log(response);

			$.each(response.data, function(k, v) {

				table.append(

					"<tr>"+

						"<td>"+

	                        "<a href='horsedetails/"+v['id']+"'>"+

	                        	(v['h_name'] == null ? '--' : v['h_name'])+

	                        "</a>"+

                        "</td>"+

                        "<td>"+v['h_sex']+"</td>"+

                        "<td>"+v['h_age']+"</td>"+

                        "<td>"+v['h_color']+"</td>"+

                        "<td>"+v['h_weight']+"</td>"+

                        "<td>"+

	                        "<a href='jockeydetails/"+v['h_j_id']+"'>"+

	                        	(v['j_name'] == null ? '--' : v['j_name'])+

	                        "</a>"+

                        "</td>"+

                        "<td>"+(v['j_jrte'] == null ? '--' : v['j_jrte'])+"</td>"+

                        "<td>"+v['o_name']+"</td>"+

                        "<td>"+(v['t_name'] == null ? '--' : v['t_name'])+"</td>"+

                    "</tr>"

				)

			});

		});

	});





	$('.select-jockey-season').on('change', function(event) {

		event.preventDefault();

		var a = $('#jockeyTable tbody');

		$.ajax({

			url: 'jockeyseason',

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	targetYear: $(this).val(),

				_token: $('meta[name="csrf-token"]').attr('content')},

		})

		.done(function (response) {

			a.empty();

			console.log(response);

			$.each(response.data, function(k, v) {

				

				a.append(

					"<tr>"+

                        "<td><a class='j-id' href='jockeydetails/"+v['id']+"/'>"+v['j_name']+"</a></td>"+

                        "<td>"+v['j_sex']+"</td>"+

                        "<td>"+v['j_age']+"</td>"+

                        "<td>"+v['j_nation']+"</td>"+

                        "<td>"+v['j_jrte']+"</td>"+

                        "<td>"+v['totalrace']+"</td>"+

                        "<td>"+v['wins1']+"</td>"+

                        "<td>"+v['wins2']+"</td>"+

						"<td>"+v['wins3']+"</td>"+

                    "</tr>"

				)

			});

		});

		

	});



	$('#select-jockey-year').on('change', function(event) {

		event.preventDefault();

		var jyear = $(this).val(),

			jid = $(this).attr('target-id');

		

		if (jyear == 'allyear'){

			$('.season-header').html('ALL YEAR');

			

		}

		else {

			$('.season-header').html('YEAR '+jyear);

		}



		var a = $('#table-season-details tbody');

		

			$.ajax({

				url: '../jockeyfilteryear',

				method: "GET",

				dataType: 'json',

				data: {

					targetYear: jyear,

					id:jid,

					_token: $('meta[name="csrf-token"]').attr('content')},

			})

			.done(function (response) {

				a.empty();

				console.log(response);

				$.each(response.data, function(k, v) {

				

					a.append(

						"<tr>"+

						"<td>"+v['r_date']+"</td>"+

						"<td>"+v['r_track']+"</td>"+

						"<td>"+v['r_length']+"</td>"+

						"<td>"+(v['r_t_type'] == null ? '--' : v['r_t_type'])+"</td>"+

						"<td>"+v['r_group']+"</td>"+

						"<td><a href='../horsedetails/"+v['h_id']+"'/>"+(v['h_name'] === null ? '--' : v['h_name'])+"</a></td>"+

						"<td>"+v['h_weight']+"</td>"+

						"<td>"+v['h_pos']+"</td>"+

						"<td>"+(v['h_half'] == null ? '--' : v['h_half'])+"</td>"+

						"<td>"+(v['h_quarter'] == null ? '--' : v['h_quarter'])+"</td>"+

						"<td>"+v['h_f_time']+"</td>"+

						"</tr>"

					)

				});

			});

		

	});





	$('#horse-filter-season').on('change',function(e){

		e.preventDefault();

		var xyear = $(this).val(),

			id = $(this).attr('target-id');



		$('.season-header').html(xyear);





		var a = $('#tblhorserecord tbody');

		

			$.ajax({

				url: '../horseracefilter',

				method: "GET",

				dataType: 'json',

				data: {

					xyear: xyear,

					id:id,

					_token: $('meta[name="csrf-token"]').attr('content')},

			})

			.done(function (response) {

				a.empty();

				console.log(response);

				$.each(response.data, function(k, v) {

				

					a.append(

						"<tr>"+

						"<td>"+v['r_date']+"</td>"+

						"<td>"+v['r_track']+"</td>"+

						"<td>"+v['r_length']+"</td>"+

						"<td>"+(v['r_t_type'] == null ? '--' : v['r_t_type'])+"</td>"+

						"<td>"+v['r_group']+"</td>"+

						"<td><a href='../jockeydetails/"+v['j_id']+"'/>"+(v['j_name'] === null ? '--' : v['j_name'])+"</a></td>"+

						"<td>"+v['h_weight']+"</td>"+

						"<td>"+v['h_pos']+"</td>"+

						"<td>"+(v['h_half'] == null ? '--' : v['h_half'])+"</td>"+

						"<td>"+(v['h_quarter'] == null ? '--' : v['h_quarter'])+"</td>"+

						"<td>"+v['h_f_time']+"</td>"+

						"<td><a href='//"+v['r_replay']+"' target='_blank'><button><span class='fa fa-play'></span></button></a></td>"+

						"</tr>"

					)

				});

			});



	});





	$('.temp-race-btn').on('click', function(event) {

		event.preventDefault();

		

		$('.temp-date-sect').removeClass('cur_date');

		$(this).find('.temp-date-sect').addClass('cur_date');

		$('.race-temp-result').hide();



		$('.'+$(this).attr('target-action')).show();



	});





	$('.terms-condition').on('click',  function(event) {

		event.preventDefault();

		$(this).closest('#registerModal').find('.close').trigger('click');

		$('.terms-btn').trigger('click');

	}); 



	$('.nav-register').on('click', function(event) {

		event.preventDefault();

		/* Act on the event */

		$('.error-msg').html('');

		clearinput( 'main-input' );

	});



	$('.otp-btn').on('click', function(event) {

		event.preventDefault();

		/*clear Input*/

		clearinput( 'otp-input' );

		clearinput( 'otp-active-email' );

		clearinput( 'otp-active-number' );

		clearinput( 'verification_code' );

	});



	$('.btn-red-login').on('click', function(event) {

		event.preventDefault();

		$(this).closest('#notiModal').find('.close').trigger('click');

		$('.nav-login').trigger('click');

	});



	$('.btn-s-link').on('click', function(event) {

		event.preventDefault();

		/* Act on the event */



		// $(this).find('.fa-plus').toggle();

		// $(this).find('.fa-times').toggle();

		if ($(this).hasClass('closed')) {

			$('.btn-s-link').removeClass('open');

			$('.btn-s-link').removeClass('closed').addClass('closed');

			$(this).removeClass('closed').addClass('open');

			$('.btn-s-link').find('.fa-plus').show();

			$('.btn-s-link').find('.fa-times').hide();

			$(this).find('.fa-plus').hide();

			$(this).find('.fa-times').show();

		}else{

			$('.btn-s-link').removeClass('open');

			$('.btn-s-link').removeClass('closed').addClass('closed');

			$(this).removeClass('open').addClass('closed');

			$('.btn-s-link').find('.fa-plus').show();

			$('.btn-s-link').find('.fa-times').hide();

			$(this).find('.fa-plus').show();

			$(this).find('.fa-times').hide();

		}

		

	});



	$('.otp-input').keyup(function () {

        event.preventDefault();



        if ($(this).val() != '') {

        	$(this).closest('div').next('div').find('input:text').focus(); 

        }



        var first = $('.f-key').val(),

            second = $('.s-key').val(),

            third = $('.t-key').val(),

            fourth = $('.o-key').val(),

            fifth = $('.v-key').val(),

            sixth = $('.x-key').val();



        if ($.isNumeric($(this).val())) {

          $('.verification_code').val(first + '' + second + '' + third + '' + fourth + '' + fifth + '' + sixth);

        } else {

          $(this).val('');

          return false;

        }

    });



	$('.btn-signup').on('click', function (event) {

		

		var formSelect = $(this).closest('form').attr('id');



		// Check if terms is accepted

		var termsInput = $(this).closest('form').find('.form-check-input').prop("checked"),

			regInput = $(this).closest('form').find('.main-input').val(),

			activeFrm = $('#'+formSelect);



		if (regInput == '') {

			$('.error-msg').html('Please Input Email or Mobile Number');

			return false;

		}



		if (termsInput == false) {

			$('.error-msg').html('Please Accept terms and conditions');

			return false;

		}



		registeruser( formSelect );



	});



	$('.resend-otp').on('click', function(event) {

		event.preventDefault();

		/* Act on the event */

		/*SEND OTP GAMIT UNG NUMBE OR EMAIL NA BIGAY*/

	});





	$('.btn-verify').on('click', function (event) {

        event.preventDefault();

        /* Act on the event */



        var formSelect = $('#verifyOTP');



        $('.error-otp').html('Processing....');

        $('.otp-spinner').show();



        $.ajax({

            url: formSelect.attr('action'),

            type: formSelect.attr('method'),

            data: formSelect.serialize()

          }).done(function (response) {

            console.log(response['success']);



            	if (response['success'] == true) {

            		if (response['status'] == 'mobile') {

            			$('.btn-verify').closest('.modal-content').find('.close').trigger('click');

	            		$('#profileModal').find('.active-number').val(response['activeData']);

	            		$('.profile-btn').trigger('click');

            		}else{

            			//Email HERE

            			if (response['opt'] == 'email-verified') {

            				$('.error-otp').html('').html(response['message']);



            				setTimeout(

								function() 

								{

									$('#otpModal').find('.close').trigger('click');

									$('#profileModal').find('.active-email').val(response['activeData']);

									$('.profile-btn').trigger('click');

									$('.error-otp').html('');

									$('.otp-spinner').hide();

								}, 3000

							);



            			}

            		}

            		

            	}else{

            		$('.error-otp').html('').html(response['activeData']);

            		return false;

            	}



        });



    });





    $('.complete-registration').on('click', function (event) {

        event.preventDefault();

        /* Act on the event */



        var frm = $('#completeRegistration');

        $.ajax({

          url: frm.attr('action'),

          type: frm.attr('method'),

          data: frm.serialize()

        }).done(function (response) {

          console.log(response);



          	if(response['opt'] == 'wrong-confirm'){

				$('.profile-msg').html('').html(response['message']);

			}else{

				$('.close').trigger('click');

          		$('.notification-btn').trigger('click');

			}

          

        });

    });



    



    $('.numberCircle').on('click', function(event) {

    	event.preventDefault();

    	

    	var a = $(this).attr('target-color');



    	$('.tip-area').hide();



    	$(this).closest('.card').find('.'+a).toggle();

    	

    });



    $('.tool-tip-close').on('click', function(event) {

    	event.preventDefault();

    	/* Act on the event */

    	$(this).closest('div').hide();

    });



    function unserialize(serializedData) {

	    var urlParams = new URLSearchParams(serializedData); // get interface / iterator

	    unserializedData = {}; // prepare result object

	    for ([key, value] of urlParams) { // get pair > extract it to key/value

	        unserializedData[key] = value;

	    }



	    return unserializedData;

	}



	$('.frp-sect-result').on('click', function(event) {



		event.preventDefault();



		var section = $(this).next('.hid-panel'),

    		targetId = $(this).attr('target-race'),

    		targetDate = $(this).attr('target-date');



    	section.find('.row-horse-accordion').remove();

    	section.find('.b-r').remove();



    	let curUrl = window.location.href,

			result = /[^/]*$/.exec(curUrl)[0],

			d = new Date(result);



		var _url = d.toString() === 'Invalid Date'? 'getallresult' : '../getallresult';



    	$.ajax({

	        url: _url ,

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	targetId: targetId,

		      	targetDate: targetDate,

				_token: $('meta[name="csrf-token"]').attr('content')

		    },

	        success: function (data) {



	        	console.log(data);

				section.find('.main-bet-header').empty();

	        	$.each(data.data, function(k, v) {

					

		        	section.find('.main-bet-header').append(

	          			"<div class='col-lg-3 p-l-0' style='text-align:left; padding-left: 35px;'>"+(v['r_clocking'] === null ? '---' : v['r_clocking'])+"</div>"+

	          			"<div class='col-lg-3 p-l-0' style='text-align:left'> Length Finished = "+(v['r_l_finished'] === null ? '00:00:00' : v['r_l_finished'])+"</div>"+

	          			"<div class='col-lg-3 p-l-0' style='text-align:left'>"+(v['r_timein'] === null ? '00:00:00' : v['r_timein'])+"</div>"+

	          			"<div class='col-lg-3 p-l-0' style='text-align:left'>(R-"+(v['r_R'] === null ? '--' : v['r_R'])+")</div>"

	          		)

		        	

		        });

				section.find('.b-res').empty();

				

	        	$.each(data.bres, function(k, v) {

					

	        		section.find('.b-res').append(

	        			"<div class='col-sm-3' style='width:50% !important;padding: 0;font-weight: 600;'>"+v['br_bet']+" = "+v['br_amount']+"</div>"

	        		);

	        	});



	        	$('#resultTable tbody').empty();

	        	$.each(data.allres, function(k, v) {

	        		$('#resultTable tbody').append(

	        			"<tr>"+

	        				"<td>"+v['h_half']+"</td>"+

	        				"<td>"+v['h_quarter']+"</td>"+

	        				"<td>"+v['h_num']+"</td>"+

	        				"<td><span><i class='fas fa-horse-head'></i></span><strong>"+v['h_name']+"</strong></td>"+

	        				"<td>"+v['j_name']+"</td>"+

	        				"<td>"+v['h_weight']+"</td>"+

	        				"<td>"+v['h_llamado']+"</td>"+

	        				"<td>"+v['h_f_time']+"</td>"+

	        			"</tr>"

	        		);

	        	});

	        }

	    });

	});



	$('.no-vid').on('click', function(event) {

		event.preventDefault();

		alert("No Race Video Found!");

	});





    $('.frp-sect').on('click', function(event) {

    	event.preventDefault();

	    	/* Act on the event */

			

	    	var section = $(this).next('.panel'),

	    		targetId = $(this).attr('target-race'),

	    		targetDate = $(this).attr('target-date');

	    	section.find('.row-horse-accordion').remove();

	    	section.find('.b-r').remove();

			



	    	let curUrl = window.location.href,

			result = /[^/]*$/.exec(curUrl)[0],

			d = new Date(result);



			var _url = d.toString() === 'Invalid Date'? 'racehorses' : '../racehorses';



	    	$.ajax({

	        url: _url,

	        method: "GET",

	        dataType: 'json',

		      data: {

		      	targetId: targetId,

		      	targetDate: targetDate,

				_token: $('meta[name="csrf-token"]').attr('content')

		    },

	        success: function (data) {

	          console.log(data.bet);



	          if($.trim(data.bet)){

	          	var blueTip = data.bet[0]['rd_blue'],

	              	redTip = data.bet[0]['rd_red'],

	              	yellowTip = data.bet[0]['rd_yellow'];

	          }else{

	          	var blueTip = "--",

	              	redTip = "--",

	              	yellowTip = "--";

	          }



	          var counterX = 1;

	              

	              spanb1 = '',

	              spanb2 = '',

	              spanb3 = '',

	              spang1 = '',

	              spang2 = '',

	              spang3 = '',

	              spanr1 = '',

	              spanr2 = '',

	              spanr3 = '';



		        console.log(data);



		        $.each(data.tip, function(k, v) {

					$('.sub-bet-header').remove();

					console.log(v['rd_p_bet']);

		        	$.each(v['rd_p_bet'], function(a, b) {

		        		section.find('.main-bet-header').append(

		          			// "<div class='col-2 b-r m-w-33' style='border-right: solid 1px gray;'>"+b+"</div>"

							  

							  "<div class='sub-bet-header'>"+b+"</div>"						  

							  

		          		)

		        	});

		        	

		        });

				section.find('.col-b').empty();

				section.find('.col-r').empty();

				section.find('.col-y').empty();

		        $.each(data.bet, function(k, v) {

		        	if (v['rd_blue'] != null) {

		        		section.find('.col-b').append(

		          			"<div class='b-r m-w-33' style='float: left;padding: 0;width: 25px;background-color: blue;text-align: center;border-radius: 20px;margin-right: 2px; color: #fff'>"+(v['rd_blue'] == null ? '--' : v['rd_blue'])+"</div>"

		          		) 

		        	}

		        	



	          		if (v['rd_red'] != null) {

	          			section.find('.col-r').append(

		          			"<div class='b-r m-w-33' style='float: left;padding: 0;width: 25px;background-color: red;text-align: center;border-radius: 20px;margin-right: 2px; color: #fff'>"+(v['rd_red'] == null ? '--' : v['rd_red'])+"</div>"

		          		)

		        	}



	          		



	          		if (v['rd_yellow'] != null) {

	          			section.find('.col-y').append(

		          			"<div class='b-r m-w-33' style='float: left;padding: 0;width: 25px;background-color: yellow;text-align: center;border-radius: 20px;margin-right: 2px; color: #fff'>"+(v['rd_yellow'] == null ? '--' : v['rd_yellow'])+"</div>"

		          		)

		        	}

		        });

	          	





		        let _a = '',

	          		_b = '',

	          		_c = '';

	          	if (data.activeuser == 'monthly' || data.activeuser == 'yearly') {

	          		_a = "<table class='tbl-last-five-jockey j-race table-bordered section-tab-table' style='width:100%;display: none;background-color:#fff'>"+

			                "<thead>"+

			                	"<tr>"+

									"<th style='height: 6vh; text-align:center;'>JRTE</th>"+

									"<th style='height: 6vh; text-align:center;'>YEAR STARTED</th>"+

									"<th style='height: 6vh; text-align:center;'>YEARS PLAYED</th>"+

									"<th style='height: 6vh; text-align:center;'>TOTAL RACES</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF WINS</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF 2NDS</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF 3RDS</th>"+

								"</tr>"+

			                "</thead>"+

			                "<tbody></tbody>"+

			            "</table>";

	          		_b = "<table class='tbl-last-five-trainer t-race table-bordered section-tab-table' style='width:100%;display: none;background-color:#fff'>"+

			                "<thead>"+

								"<tr>"+

									"<th style='height: 6vh; text-align:center;'>YEAR STARTED</th>"+

									"<th style='height: 6vh; text-align:center;'>TOTAL RACES</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF WINS</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF 2NDS</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF 3RDS</th>"+

								"</tr>"+

			                "</thead>"+

			                "<tbody></tbody>"+

			            "</table>";

	          		_c = "<table class='tbl-last-five-owner o-race table-bordered section-tab-table' style='width:100%;display: none;background-color:#fff'>"+

			                "<thead>"+

			                	"<tr>"+

									"<th style='height: 6vh; text-align:center;'>YEAR STARTED</th>"+

									"<th style='height: 6vh; text-align:center;'>TOTAL RACES</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF WINS</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF 2NDS</th>"+

									"<th style='height: 6vh; text-align:center;'>NUMBER OF 3RDS</th>"+

								"</tr>"+

			                "</thead>"+

			                "<tbody></tbody>"+

			            "</table>";

	          	}



	          	console.log('AAAA'+ data.data);

				$('.row-horse-accordion').remove();

	          	$('.horse-accordion').remove();

	          	console.log(data);

	          	

	          $.each(data.data, function(k, v) {

	          	let _indicator = '';

	          	if (v['rd_indicate'] == 1) {

	          		_indicator = "<span class='fas fa-angle-double-up' style='color: green;'>&nbsp</span>";

	          	}else{

	          		_indicator = "<span class='fas fa-angle-double-down' style='color: red;'>&nbsp</span>";

	          	}

				  

				 

	              section.append(

	              	"<div class='row row-horse-accordion' style='padding-bottom: 15px'>"+

                    "<hr>"+

		              	"<div class='horse-accordion' style='padding-left: 15px;padding-right: 0px'>"+

	                        "<div class='row' style='width: 100%'>"+



	                        	"<div class='col-lg-9 col-sm-6' style='font-size:13px;'>"+

								  	"<span class='horse-accordion-control numbering'>"+

								  		"<a class='aaaa' style='font-weight:700;font-size: 20px;'>"+v['h_num']+"</a>&nbsp"+

								  	"</span>"+

								  	// "<span class='accordion-header-group'>"+

								        _indicator+

								        "<span class='fas fa-horse-head'>&nbsp</span>"+

								        "<span class='font-f' style='padding: 0% 5%;'>"+v['h_name']+"</span>"+

								        "<span class='display-desk' style='padding-right: 5%;'>"+v['j_name']+"</span>"+

								        "<span class='display-desk' style='padding-right: 5%;'>"+v['h_weight']+"</span>"+

								        "<span class='display-desk' style='padding-right: 5%;'>"+v['j_jrte']+"</span>"+

								    // "</span>"+

								"</div>"+



								"<div class='col-lg-3 col-sm-6 p-3-0' style='padding-right: 0;font-size:13px;'>"+

	                                "<table style='width:100%;'>"+

	                                    "<tr>"+

	                                        "<td style='text-align:right;'>"+

	                                            "<span style='padding-right: 5%;'>"+v['h_bet_odds']+"</span>"+

	                                            "<span style='z-index:999999' class='fa fa-2x fa-star-o star-post' target-race='"+['r_id']+"'><span class='star-num'></span></span>"+

	                                        "</td>"+

	                                    "</tr>"+

	                                "</table>"+

	                            "</div>"+



	                        "</div>"+



	                    "</div>"+



	                    "<div class='stats-panel' style='0% 1% !important'>"+

						    "<div class='row'>"+

						        "<div class='col-sm-12'>"+

						            "<div class='scrollmenu' style='font-size:13px;'>"+

						                "<a href='javascript:void(0)' targte-h='"+v['h_id']+"' target-table='tbl-last-five-race' class='inner-link primary-l' style='text-decoration:underline; font-weight: bolder'>LAST 5 RACES</a>"+

						                "<a href='javascript:void(0)' targte-h='"+v['h_id']+"' target-table='tbl-last-five-dist' class='inner-link'>BEST TIME</a>"+

						                "<a href='javascript:void(0)' targte-h='"+v['j_id']+"' target-table='tbl-last-five-jockey' class='inner-link'>JOCKEY</a>"+

						                "<a href='javascript:void(0)' targte-h='"+v['t_id']+"' target-table='tbl-last-five-trainer' class='inner-link'>TRAINER</a>"+

						                "<a href='javascript:void(0)' targte-h='"+v['o_id']+"' target-table='tbl-last-five-owner' class='inner-link'>OWNER</a>"+

						            "</div>"+

						        "</div>"+

						    "</div>"+

						    "<div class='row tab-inner-f-r' style='overflow-x:auto;font-size:13px;width:100%;margin:0 0;'>"+



						        "<div class='col-sm-12' style='padding: 0% 0%;'>"+

						            "<table class='tbl-last-five-race table-bordered section-tab-table' style='width:100%;background-color:#fff'>"+

						                "<thead>"+

						                	"<tr>"+

												"<th style='height: 6vh; text-align:center;'>DATE</th>"+

												"<th style='height: 6vh; text-align:center;'>LENGTH</th>"+

												"<th style='height: 6vh; text-align:center;'>JOCKEY</th>"+

												"<th style='height: 6vh; text-align:center;'>POS</th>"+

												"<th style='height: 6vh; text-align:center;'>VIDEO REPLAY</th>"+

											"</tr>"+

						                "</thead>"+

						                "<tbody></tbody>"+

						            "</table>  "+                                 

						        "</div>"+



						        "<div class='col-sm-12' style='padding: 0% 0%;'>"+

						            "<table class='tbl-last-five-dist table-bordered section-tab-table' style='width:100%;display: none;background-color:#fff'>"+

						                "<thead>"+

						                	"<tr>"+

												"<th style='height: 6vh; text-align:center;'>TRACK LENGTH</th>"+

												"<th style='height: 6vh; text-align:center;'>BEST TIME</th>"+

												"<th style='height: 6vh; text-align:center;'>RACE TRACK</th>"+

												"<th style='height: 6vh; text-align:center;'>TRACK TYPE</th>"+

											"</tr>"+

						                "</thead>"+

						                "<tbody></tbody>"+

						            "</table>  "+                                 

						        "</div>"+



						        "<div class='col-sm-12' style='padding: 0% 0%;'>"+

						            "<table class='tbl-last-five-jockey j-profile table-bordered section-tab-table' style='margin-bottom:1%;width:100%;display: none;background-color:#fff'>"+

						                "<thead>"+

						                	"<tr>"+

												"<th style='height: 6vh; text-align:center;'>JOCKEY ID</th>"+

												"<th style='height: 6vh; text-align:center;'>JOCKEY NAME</th>"+

												"<th style='height: 6vh; text-align:center;'>JOCKEY SEX</th>"+

												"<th style='height: 6vh; text-align:center;'>JOCKEY AGE</th>"+

												"<th style='height: 6vh; text-align:center;'>NATIONALITY</th>"+

												"<th class='bg-width-mb w-262px-mb' style='width:30%;height: 6vh; text-align:center;'>BACKGROUND</th>"+

											"</tr>"+

						                "</thead>"+

						                "<tbody></tbody>"+

						            "</table>  "+

						            _a+                                

						        "</div>"+



						        "<div class='col-sm-12' style='padding: 0% 0%;'>"+

						            "<table class='tbl-last-five-trainer t-prof table-bordered section-tab-table' style='margin-bottom:1%;width:100%;display: none;background-color:#fff'>"+

						                "<thead>"+

						                	"<tr>"+

												"<th style='height: 6vh; text-align:center;'>TRAINER ID</th>"+

												"<th style='height: 6vh; text-align:center;'>TRAINER NAME</th>"+

												"<th style='height: 6vh; text-align:center;'>TRAINER SEX</th>"+

												"<th style='height: 6vh; text-align:center;'>TRAINER AGE</th>"+

												"<th style='height: 6vh; text-align:center;'>NATIONALITY</th>"+

												"<th class='bg-width-mb w-262px-mb'style='width:30%;height: 6vh; text-align:center;'>BACKGROUND</th>"+

											"</tr>"+

						                "</thead>"+

						                "<tbody></tbody>"+

						            "</table>  "+ 



						            _b+                                 

						        "</div>"+



						        "<div class='col-sm-12' style='padding: 0% 0%;'>"+

						            "<table class='tbl-last-five-owner o-prof table-bordered section-tab-table' style='margin-bottom:1%;width:100%;display: none;background-color:#fff'>"+

						                "<thead>"+

						                	"<tr>"+

												"<th style='height: 6vh; text-align:center;'>OWNER ID</th>"+

												"<th style='height: 6vh; text-align:center;'>OWNER NAME</th>"+

												"<th style='height: 6vh; text-align:center;'>OWNER SEX</th>"+

												"<th style='height: 6vh; text-align:center;'>OWNER AGE</th>"+

												"<th style='height: 6vh; text-align:center;'>NATIONALITY </th>"+

												"<th class='bg-width-mb w-262px-mb' style='width:30%;height: 6vh; text-align:center;'>BACKGROUND </th>"+

											"</tr>"+

						                "</thead>"+

						                "<tbody></tbody>"+

						            "</table>  "+  

						             _c+                                

						        "</div>"+



						    "</div>"+

						"</div>"+

	                    

                    "</div>"

	             );

	              counterX++;

	          });

	        }

	   	});

			

    });



	$(document).on('click', '.inner-link', function(event) {

		$('.inner-link').css({

			'text-decoration': '',

			'font-weight': ''

		});

		$(this).css({

			'text-decoration': 'underline',

			'font-weight': 'bolder'

		});



		$('.section-tab-table').hide();

		$('.'+$(this).attr('target-table')).show();



		let _url = '';

		if ($(this).attr('target-table') == 'tbl-last-five-race') {

			_url = 'lastfive/race';

		}

		if ($(this).attr('target-table') == 'tbl-last-five-dist') {

			_url = 'lastfive/dist';

		}

		if ($(this).attr('target-table') == 'tbl-last-five-jockey') {

			_url = 'lastfive/jockey';

		}

		if ($(this).attr('target-table') == 'tbl-last-five-trainer') {

			_url = 'lastfive/trainer';

		}

		if ($(this).attr('target-table') == 'tbl-last-five-owner') {

			_url = 'lastfive/owner';

		}

		$('.tbl-last-five-race tbody').empty();

		$('.tbl-last-five-dist tbody').empty();

		$('.tbl-last-five-jockey tbody').empty();

		$('.tbl-last-five-trainer tbody').empty();

		$('.tbl-last-five-owner tbody').empty();

		getlastdetails( _url, $(this).attr('targte-h'));

	});



	function getlastdetails( _url, _targetHid){



		$.ajax({

			url: _url,

			type: 'POST',

			dataType: 'json',

			data: {

				targethorseid: _targetHid,

				_token: $('meta[name="csrf-token"]').attr('content')

			},

		})

		.done(function(resp) {

			console.log(resp.data);

			$.each(resp.data, function(k, v) {

				if (resp['success'] == true) {

					switch(resp['tbl']) {

					  	case 'race':

					    	$('.tbl-last-five-race tbody').append(

					    		"<tr  style='height: 6vh;text-align:center;'>"+

					    			"<td>"+v['r_date']+"</td>"+

					    			"<td>"+v['r_length']+"</td>"+

					    			"<td>"+v['j_name']+"</td>"+

					    			"<td>"+v['h_pos']+"</td>"+

					    			"<td><a target='_blank' href='https://"+v['r_replay']+"'><i class='fas fa-play-circle fas' style='color:orange'></i></a></td>"+

					    		"</tr>"

					    	);

					    	break;

					  	case 'dist':

					    	$('.tbl-last-five-dist tbody').append(

					    		"<tr  style='height: 6vh; text-align:center;'>"+

					    			"<td>"+v['r_length']+"</td>"+

					    			"<td>"+v['besttime']+"</td>"+

					    			"<td>"+v['r_track']+"</td>"+

					    			"<td>"+v['r_t_type']+"</td>"+

					    		"</tr>"

					    	);

					    	break;

					    case 'jockey':

					    	$('.j-profile tbody').append(

					    		"<tr  style='height: 6vh;'>"+

					    			"<td>"+appendZeros( 'JID', v['id'] ) +"</td>"+

					    			"<td>"+v['j_name']+"</td>"+

					    			"<td>"+(v['j_sex'] == 'M' ? 'Male' : 'Female')+"</td>"+

					    			"<td>"+v['j_age']+"</td>"+

					    			"<td>"+v['j_nation']+"</td>"+

					    			"<td class='text-wrap'>"+v['j_bground']+"</td>"+

					    		"</tr>"

					    	);



					    	$('.j-race tbody').append(

					    		"<tr  style='height: 6vh;text-align:center;'>"+

					    			"<td>"+v['j_jrte']+"</td>"+

					    			"<td>"+v['j_started']+"</td>"+

					    			"<td>"+v['ycount']+"</td>"+

					    			"<td>"+v['rnum']+"</td>"+

					    			"<td>"+v['numwins']+"</td>"+

					    			"<td>"+v['numwins2']+"</td>"+

					    			"<td>"+v['numwins3']+"</td>"+

					    		"</tr>"

					    	);

					    	break;

					    case 'trainer':

					    	$('.t-prof tbody').append(

					    		"<tr  style='height: 6vh;'>"+

					    			"<td>"+appendZeros( 'TID', v['id'] ) +"</td>"+

					    			"<td>"+v['t_name']+"</td>"+

					    			"<td>"+(v['t_sex'] == 'M' ? 'Male' : 'Female')+"</td>"+

					    			"<td>"+v['t_age']+"</td>"+

					    			"<td>"+v['t_nation']+"</td>"+

					    			"<td class='text-wrap'>"+v['t_bground']+"</td>"+

					    		"</tr>"

					    	);



					    	$('.t-race tbody').append(

					    		"<tr  style='height: 6vh;text-align:center;'>"+

					    			"<td>"+v['t_started']+"</td>"+

					    			"<td>"+v['rnum']+"</td>"+

					    			"<td>"+v['numwins']+"</td>"+

					    			"<td>"+v['numwins2']+"</td>"+

					    			"<td>"+v['numwins3']+"</td>"+

					    		"</tr>"

					    	);

					    	break;

					    case 'owner':

					    	$('.o-prof tbody').append(

					    		"<tr  style='height: 6vh;'>"+

					    			"<td>"+appendZeros( 'OID', v['id'] ) +"</td>"+

					    			"<td>"+v['o_name']+"</td>"+

					    			"<td>"+(v['o_sex'] == 'M' ? 'Male' : 'Female')+"</td>"+

					    			"<td>"+v['o_age']+"</td>"+

					    			"<td>"+v['o_nation']+"</td>"+

					    			"<td class='text-wrap'>"+v['o_bground']+"</td>"+

					    		"</tr>"

					    	);



					    	$('.o-race tbody').append(

					    		"<tr  style='height: 6vh;text-align:center;'>"+

					    			"<td>"+v['o_started']+"</td>"+

					    			"<td>"+v['rnum']+"</td>"+

					    			"<td>"+v['numwins']+"</td>"+

					    			"<td>"+v['numwins2']+"</td>"+

					    			"<td>"+v['numwins3']+"</td>"+

					    		"</tr>"

					    	);

					    	break;

					  	default:

					    	// code block

					}

				}

			});

		});



	}



	$(document).on('click', '.aaaa', function(event) {

		

		// $('.row .row-horse-accordion').css('backgorund-color','#fff');

		// $(this).closest('.row-horse-accordion').css('background-color', '#cecece');

		 $(this).closest('.row-horse-accordion').find('.primary-l').trigger('click');

	});





	$('.nav-login').on('click', function(){

		$('.navbar-collapse').collapse('hide');

	});

	$('.nav-register').on('click', function(){

		$('.navbar-collapse').collapse('hide');

	});





	function registeruser( _formSelect ){



		// console.log(_formSelect);

		// return false;



		var _activeFrm = $('#'+_formSelect);



		$('.error-msg').html('Processing....');

        $('.error-spinner').show();



		$.ajax({

            url: _activeFrm.attr('action'),

            type: _activeFrm.attr('method'),

            data: _activeFrm.serialize()

          }).done(function (response) {

            console.log(response);

            if (response['success'] == 'mobunverified') {

            	$('.error-msg').html('').html(response['message']);

            	//Reddirect to OTP

            	setTimeout(

				  function() 

				  {

					$('#registerModal').find('.close').trigger('click');

					$('.otp-btn').trigger('click');

					$('.otp-active-number').val('').val(response['activedata']);

					$('.error-spinner').hide();

				  }, 3000

				);

            	

            }else if(response['success'] == 'verified'){

            	$('.error-msg').html('').html(response['message']);



            	if (response['status'] == 'email') {

            		setTimeout(

					  function() 

					  {

						$('#registerModal').find('.close').trigger('click');

						$('#emailInput').val('').val(response['activedata']);

						$('#signinModal').find('div#phone').removeClass('show').removeClass('active');

						$('#signinModal').find('div#email').addClass('show').addClass('active');

						$('.nav-login').trigger('click');

						$('.error-spinner').hide();

					  }, 3000

					);

            	}else{

            		setTimeout(

					  function() 

					  {

						$('#registerModal').find('.close').trigger('click');

						$('.phoneInput').val('').val(response['activedata']);

						$('.nav-login').trigger('click');

						$('.error-spinner').hide();

					  }, 3000

					);

            	}



            	

            }else if(response['success'] == 'profincomplete'){

            	$('.error-msg').html('').html(response['message']);



            	if (response['status'] == 'email') {

            		setTimeout(

					  function() 

					  {

						$('#registerModal').find('.close').trigger('click');

						$('.active-email').val('').val(response['activedata']);

						$('.profile-btn').trigger('click');

						$('.error-spinner').hide();

					  }, 3000

					);

            	}else{

            		setTimeout(

					  function() 

					  {

						$('#registerModal').find('.close').trigger('click');

						$('.active-number').val('').val(response['activedata']);

						$('.profile-btn').trigger('click');

						$('.error-spinner').hide();

					  }, 3000

					);

            	}



            	

            	

            }else if(response['success'] == true){

            	if (response['status'] == 'email') {

            		$('.error-spinner').hide();

            		$('#registerModal').find('.close').trigger('click');

					$('.otp-btn').trigger('click');

					$('.otp-active-email').val('').val(response['activedata']);

            	}else{

            		$('.error-spinner').hide();

            		$('#registerModal').find('.close').trigger('click');

					$('.otp-btn').trigger('click');

					$('.otp-active-number').val('').val(response['activedata']);

            	}

            	

            }else if(response['success'] == 'otp'){

            	$('.error-msg').html('').html(response['message']);



            	setTimeout(

				  function() 

				  {

					$('#registerModal').find('.close').trigger('click');

					$('.otp-btn').trigger('click');

					$('.otp-active-email').val('').val(response['activedata']);

					$('.error-spinner').hide();

				  }, 3000

				);

            }

        });

	}







	function clearinput( _classname ){

		$('.'+_classname).val('');

	}



	$(document).on('click', '.star-post', function(event) {

		event.preventDefault();

		var spanInnerData = getSpanDataByClass("star-num");

		var maxValueInArray = Math.max.apply(Math, spanInnerData);

		var minValueInArray = Math.min.apply(Math, spanInnerData);

	

		var rowpost = $(this).find('.star-num').html();



		if ($(this).find('.star-num').html() == "") {

			let a = maxValueInArray + 1;

			$(this).html('<p class="star-num">'+a+'</p>');

			$(this).removeClass('fa-star-o').addClass('fa-star star-color');

		}else{

			$(this).removeClass('fa-star star-color').addClass('fa-star-o');

			$(this).find('.star-num').html("")

			$('.star-post').each(function(index) {

			    if ($(this).find('.star-num').html() > rowpost) {

			    	$(this).find('.star-num').html($(this).find('.star-num').html() - 1)

			    }

			});

		}

	});





	function getSpanDataByClass(className){

	  var spans = document.getElementsByClassName(className),

	      result = [];

	  

	  if(!spans){

	    //no data 

	  }

	  

	  for(var i = 0; i < spans.length; i++){

	    result.push(spans[i].innerHTML);

	  }



	  return result;

	};













	/*Custom Javascript + Jquery for Date dropdown*/

	/*

		Datepicker plugin see botom

*/





	;(function ($, window, document, undefined) {



	    "use strict";



	    // Create the defaults once

	    var pluginName = "dateDropdowns",

	        pluginDefaults = {

	            defaultDate: null,

	            defaultDateFormat: "yyyy-mm-dd",

	            displayFormat: "dmy",

	            submitFormat: "yyyy-mm-dd",

	            minAge: 0,

	            maxAge: 120,

	            minYear: null,

	            maxYear: null,

	            submitFieldName: "date",

	            wrapperClass: "date-dropdowns",

	            dropdownClass: null,

	            daySuffixes: true,

	            monthSuffixes: true,

	            monthFormat: "long",

	            required: false

	        };



	    // The actual plugin constructor

	    function Plugin (element, options) {

	        this.element = element;                                 // Element handle

	        this.$element = $(element);                             // jQuery element handle

	        this.config = $.extend({}, pluginDefaults, options);    // Plugin options

	        this.internals = {                                      // Internal variables

	            objectRefs: {}

	        };

	        this._defaults = pluginDefaults;                        // Reference to the plugin defaults

	        this._name = pluginName;                                // Reference to the plugin name

	        this.init();



	        return this;

	    }



		Plugin.message = {

			day: "Day",

			month: "Month",

			year: "Year"

		};



	    // Avoid Plugin.prototype conflicts

	    $.extend(Plugin.prototype, {



	        /**

	         * Initialise the plugin

	         */

	        init: function () {

	            this.checkForDuplicateElement();

	            this.setInternalVariables();

	            this.setupMarkup();

	            this.buildDropdowns();

	            this.attachDropdowns();

	            this.bindChangeEvent();



	            if (this.config.defaultDate) {

	                this.populateDefaultDate();

	            }

	        },



	        /**

	         * Check whether an element exists with the same name attribute. If so, throw an error

	         */

	        checkForDuplicateElement: function() {

	            if ($("input[name=\"" + this.config.submitFieldName + "\"]").length) {

	                $.error("Duplicate element found");

	                return false;

	            }



	            return true;

	        },



	        /**

	         * Set the plugin"s internal variables

	         */

	        setInternalVariables: function() {

	            var date = new Date();

	            this.internals.currentDay = date.getDate();

	            this.internals.currentMonth = date.getMonth() + 1;

	            this.internals.currentYear = date.getFullYear();

	            this.internals.monthShort = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

	            this.internals.monthLong = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

	        },



	        /**

	         * Set the container which will hold the date dropdowns.

	         *

	         * - If the element on which the plugin was called is an input of type text or hidden, set it to

	         *   be hidden and wrap it in a div. This outer div will become the container.

	         * - If the element was an HTML element (e.g. <div/>), create a hidden text field within it, and use

	         *   the div as the container.

	         */

	        setupMarkup: function() {

	            var wrapper, hiddenField;



	            if (this.element.tagName.toLowerCase() === "input") {

		            if (!this.config.defaultDate) {

			            this.config.defaultDate = this.element.value;

		            }

	                

	                // Configure the input element and wrap

	                hiddenField = this.$element.attr("type", "hidden")

	                    .attr("name", this.config.submitFieldName)

	                    .wrap("<div class=\"" + this.config.wrapperClass + "\"></div>");



	                wrapper = this.$element.parent();



	            } else {



	                // Build a hidden input and set this.$element as the wrapper

	                hiddenField = $("<input/>", {

	                    type: "hidden",

	                    name: this.config.submitFieldName

	                });



	                this.$element.append(hiddenField).addClass(this.config.wrapperClass);



	                wrapper = this.$element;

	            }



	            // Store a reference to the wrapper and hidden field elements for later use

	            this.internals.objectRefs.pluginWrapper = wrapper;

	            this.internals.objectRefs.hiddenField = hiddenField;



	            return true;

	        },



	        /**

	         * Generate the Day, Month and Year dropdowns

	         */

	        buildDropdowns: function() {

	            var $dayDropdown, $monthDropdown, $yearDropdown;



	            // Build the day dropdown element



	            $monthDropdown = this.buildMonthDropdown();

	            this.internals.objectRefs.monthDropdown = $monthDropdown;





	            $dayDropdown = this.buildDayDropdown();

	            this.internals.objectRefs.dayDropdown = $dayDropdown;



	            $yearDropdown = this.buildYearDropdown();

	            this.internals.objectRefs.yearDropdown = $yearDropdown;



	            return true;



	            //this.internals.objectRefs.pluginWrapper.append($dayDropdown)

	            //		 .append($monthDropdown)

	            //		 .append($yearDropdown);

	        },



	        /**

	         * Attach the generated dropdowns to the container

	         */

	        attachDropdowns: function() {

	            var $element = this.internals.objectRefs.pluginWrapper,

	                $daySelect = this.internals.objectRefs.dayDropdown,

	                $monthSelect = this.internals.objectRefs.monthDropdown,

	                $yearSelect = this.internals.objectRefs.yearDropdown;



	            switch (this.config.displayFormat) {

	                case "mdy":

	                    $element.append($monthSelect, $daySelect, $yearSelect);

	                    break;

	                case "ymd":

	                    $element.append($yearSelect, $monthSelect, $daySelect);

	                    break;

	                case "dmy":

	                default:

	                    $element.append($daySelect, $monthSelect, $yearSelect);

	                    break;

	            }



	            return true;

	        },



	        /**

	         * Bind the change event to the generated dropdowns

	         */

	        bindChangeEvent: function() {

	            var $daySelect = this.internals.objectRefs.dayDropdown,

	                $monthSelect = this.internals.objectRefs.monthDropdown,

	                $yearSelect = this.internals.objectRefs.yearDropdown,

	                pluginHandle = this,

	                objectRefs = this.internals.objectRefs;



	            objectRefs.pluginWrapper.on("change", "select", function() {

	                var day = $daySelect.val(),

	                    month = $monthSelect.val(),

	                    year = $yearSelect.val(),

	                    invalidDate = true,

	                    newDate;



	                // Find out whether the change has made the date invalid (e.g. 31st Feb)

	                invalidDate = pluginHandle.checkDate(day, month, year);



	                // If invalid - add an error class to the day dropdown and return

	                if (invalidDate) {

	                    objectRefs.dayDropdown.addClass("invalid");

	                    return false;

	                }



	                if ("00" !== objectRefs.dayDropdown.val()) {

	                    objectRefs.dayDropdown.removeClass("invalid");

	                }



	                // Empty the hidden field after each change

	                objectRefs.hiddenField.val("");



	                // Only format the submit date if a full date has been selected

	                if (!invalidDate && (day * month * year !== 0)) {

	                    newDate = pluginHandle.formatSubmitDate(day, month, year);



	                    objectRefs.hiddenField.val(newDate);

	                }



		            objectRefs.hiddenField.change();

	            });

	        },



	        /**

	         * Take a provided default date and populate both the hidden field and the

	         * dropdown elements with the relevant formatted values

	         *

	         * @returns {boolean}

	         */

	        populateDefaultDate: function() {

	            var date    = this.config.defaultDate,

	                parts   = [],

	                day     = "",

	                month   = "",

	                year    = "";



	            switch (this.config.defaultDateFormat) {

	                case "yyyy-mm-dd":

	                default:

	                    parts = date.split("-");

	                    day = parts[2];

	                    month = parts[1];

	                    year = parts[0];

	                    break;



	                case "dd/mm/yyyy":

	                    parts = date.split("/");

	                    day = parts[0];

	                    month = parts[1];

	                    year = parts[2];

	                    break;



	                case "mm/dd/yyyy":

	                    parts = date.split("/");

	                    day = parts[1];

	                    month = parts[0];

	                    year = parts[2];

	                    break;



		            case "unix":

			            parts = new Date();

			            parts.setTime(date * 1000);

			            day = parts.getDate() + "";

			            month = (parts.getMonth() + 1) + "";

			            year = parts.getFullYear();



			            if (day.length < 2) {

				            day = "0" + day;

			            }

			            if (month.length < 2) {

				            month = "0" + month;

			            }

			            break;

	            }



	            // Set the values on the dropdowns

	            

	            this.internals.objectRefs.monthDropdown.val(month);

	            this.internals.objectRefs.dayDropdown.val(day);

	            this.internals.objectRefs.yearDropdown.val(year);

	            this.internals.objectRefs.hiddenField.val(date);



	            if (true === this.checkDate(day, month, year)) {

	                this.internals.objectRefs.dayDropdown.addClass("invalid");

	            }



	            return true;

	        },



	        /**

	         * Build a generic dropdown element

	         *

	         * @param type

	         * @returns {*|HTMLElement}

	         */

	        buildBaseDropdown: function(type) {

	            var classString = type;



	            if (this.config.dropdownClass) {

	                classString += " " + this.config.dropdownClass;

	            }



	            return $("<select></select>", {

	                class: classString,

	                name: this.config.submitFieldName + "_[" + type + "]",

	                required: this.config.required

	            });

	        },



	        /**

	         * Build the day dropdown element

	         *

	         * @returns {*|HTMLElement}

	         */

	        buildDayDropdown: function() {

	            var day,

	                dropdown = this.buildBaseDropdown("day"),

		            option = document.createElement("option");



		        option.setAttribute("value", "");

		        option.appendChild(document.createTextNode(Plugin.message.day));

		        dropdown.append(option);



	            // Days 1-9

	            for (var i = 1;  i < 10; i++) {

	                if (this.config.daySuffixes) {

	                    day = i + this.getSuffix(i);

	                } else {

	                    day = "0" + i;

	                }

		            option = document.createElement("option");

		            option.setAttribute("value", "0" + i);

		            option.appendChild(document.createTextNode(day));

		            dropdown.append(option);

	            }



	            // Days 10-31

	            for (var j = 10;  j <= 31; j++) {

	                day = j;



	                if (this.config.daySuffixes) {

	                    day = j + this.getSuffix(j);

	                }

		            option = document.createElement("option");

		            option.setAttribute("value", j);

		            option.appendChild(document.createTextNode(day));

		            dropdown.append(option);

	            }



	            return dropdown;

	        },



	        /**

	         * Build the month dropdown element

	         *

	         * @returns {*|HTMLElement}

	         */

	        buildMonthDropdown: function() {

	            var dropdown = this.buildBaseDropdown("month"),

		            option = document.createElement("option");



		        option.setAttribute("value", "");

		        option.appendChild(document.createTextNode(Plugin.message.month));

	            dropdown.append(option);



	            // Populate the month values

	            for (var monthNo = 1; monthNo <= 12; monthNo++) {



	                var month;



	                switch (this.config.monthFormat) {

	                    case "short":

	                        month = this.internals.monthShort[monthNo - 1];

	                        break;

	                    case "long":

	                        month = this.internals.monthLong[monthNo - 1];

	                        break;

	                    case "numeric":

	                        month = monthNo;



	                        if (this.config.monthSuffixes) {

	                            month += this.getSuffix(monthNo);

	                        }

	                        break;

	                }



	                if (monthNo < 10) {

	                    monthNo = "0" + monthNo;

	                }



		            option = document.createElement("option");

		            option.setAttribute("value", monthNo);

		            option.appendChild(document.createTextNode(month));

		            dropdown.append(option);

	            }



	            return dropdown;

	        },



	        /**

	         * Build the year dropdown element.

	         *

	         * By default minYear and maxYear are null, however if provided they take precedence over

	         * the minAge and maxAge values.

	         *

	         * @returns {*|HTMLElement}

	         */

	        buildYearDropdown: function() {

	            var minYear = this.config.minYear,

	                maxYear = this.config.maxYear,

	                dropdown = this.buildBaseDropdown("year"),

		            option = document.createElement("option");



		        option.setAttribute("value", "");

		        option.appendChild(document.createTextNode(Plugin.message.year));

		        dropdown.append(option);



	            if (!minYear) {

	                minYear = this.internals.currentYear - (this.config.maxAge + 1);

	            }



	            if (!maxYear) {

	                maxYear = this.internals.currentYear - this.config.minAge;

	            }



	            for (var i = maxYear; i >= minYear; i--) {

		            option = document.createElement("option");

		            option.setAttribute("value", i);

		            option.appendChild(document.createTextNode(i));

		            dropdown.append(option);

	            }



	            return dropdown;

	        },



	        /**

	         * Get the relevant suffix for a day/month number

	         *

	         * @param number

	         * @returns {string}

	         */

	        getSuffix: function(number) {

	            var suffix = "";



	            switch (number % 10){

	                case 1:

	                    suffix = (number % 100 === 11) ? "th" : "st";

	                    break;

	                case 2:

	                    suffix = (number % 100 === 12) ? "th" : "nd";

	                    break;

	                case 3:

	                    suffix = (number % 100 === 13) ? "th" : "rd";

	                    break;

	                default:

	                    suffix = "th";

	                    break;

	            }



	            return suffix;

	        },



	        /**

	         * Check whether the date entered is invalid, e.g. 31st Feb

	         *

	         * @param day

	         * @param month

	         * @param year

	         * @returns {boolean}

	         */

	        checkDate: function(day, month, year) {

	            var invalidDate;



	            if (month !== "00") {

	                var numDaysInMonth = (new Date(year, month, 0).getDate()),

	                    selectedDayInt = parseInt(day, 10);



	                invalidDate = this.updateDayOptions(numDaysInMonth, selectedDayInt);



	                // If the date is invalid, empty the hidden field to prevent invalid submissions

	                if (invalidDate) {

	                    this.internals.objectRefs.hiddenField.val("");

	                }

	            }



	            return invalidDate;

	        },



	        /**

	         * Update the day options available based on the month now selected

	         *

	         * @param numDaysInMonth

	         * @param selectedDayInt

	         * @returns {boolean}

	         */

	        updateDayOptions: function(numDaysInMonth, selectedDayInt) {

	            var lastDayOption = parseInt(this.internals.objectRefs.dayDropdown.children(":last").val(), 10),

	                newDayOption = "",

	                newDayText = "",

	                invalidDay = false;



	            // If the selected month has less days than the Day dropdown currently contains - remove the extra days

	            if (lastDayOption > numDaysInMonth) {



	                while (lastDayOption > numDaysInMonth) {

	                    this.internals.objectRefs.dayDropdown.children(":last").remove();

	                    lastDayOption--;

	                }



	                // If the user-selected day is removed, indicate this so a message can be shown to the user

	                if (selectedDayInt > numDaysInMonth) {

	                    invalidDay = true;

	                }



	                // If the month contains more days than the Day dropdown contains - add the missing options

	            } else if (lastDayOption < numDaysInMonth) {



	                while (lastDayOption < numDaysInMonth) {



	                    newDayOption = ++lastDayOption;

	                    newDayText = newDayOption;



	                    // Add the suffix if required

	                    if (this.config.daySuffixes) {

	                        newDayText += this.getSuffix(lastDayOption);

	                    }



	                    // Build the option and append to the dropdown

		                var option = document.createElement("option");

		                option.setAttribute("value", newDayOption);

		                option.appendChild(document.createTextNode(newDayText));

		                this.internals.objectRefs.dayDropdown.append(option);

	                }

	            }



	            return invalidDay;

	        },



	        /**

	         * Format the selected date based on the submitFormat config value provided

	         *

	         * @param day

	         * @param month

	         * @param year

	         * @returns {*}

	         */

	        formatSubmitDate: function(day, month, year) {

	            var formattedDate,

		            _date;



	            switch (this.config.submitFormat) {

	                case "yyyy-mm-dd":

	                default:

	                    formattedDate = year + "-" + month + "-" + day;

	                    break;



	                case "mm/dd/yyyy":

	                    formattedDate = month + "/" + day + "/" + year;

	                    break;



	                case "dd/mm/yyyy":

	                    formattedDate = day + "/" + month + "/" + year;

	                    break;



		            case "unix":

			            _date = new Date();

			            _date.setDate(day);

			            _date.setMonth(month - 1);

			            _date.setYear(year);

			            formattedDate = Math.round(_date.getTime() / 1000);

	            }



	            return formattedDate;

	        },



	        /**

	         * Revert the changes applied by the plugin on the specified element

	         */

	        destroy: function() {

	            var wrapperClass = this.config.wrapperClass;



	            if (this.$element.hasClass(wrapperClass)) {

	                this.$element.empty();

	            } else {

	                var $parent = this.$element.parent(),

	                    $select = $parent.find("select");



	                this.$element.unwrap();

	                $select.remove();

	            }

	        }

	    });



	    // A really lightweight plugin wrapper around the constructor,

	    // preventing against multiple instantiations

	    $.fn[ pluginName ] = function ( options ) {

	        this.each(function() {

	            if(typeof options === "string") {

	                var args = Array.prototype.slice.call(arguments, 1);

	                var plugin = $.data(this, "plugin_" + pluginName);



	                if (typeof plugin === "undefined") {

	                    $.error("Please initialize the plugin before calling this method.");

	                    return false;

	                }

	                plugin[options].apply(plugin, args);

	            } else {

	                if ( !$.data( this, "plugin_" + pluginName ) ) {

	                    $.data( this, "plugin_" + pluginName, new Plugin( this, options ) );

	                }

	            }

	        });

	        // chain jQuery functions

	        return this;

	    };



	})( jQuery, window, document );







	/* js code */





	$(".date-dropdowns").dateDropdowns();





	/* js for accordion in Full Race Program */

	// var acc = document.getElementsByClassName("accordion");

	// var i;



	// for (i = 0; i < acc.length; i++) {

	// acc[i].addEventListener("click", function() {

	// 	this.classList.toggle("active");

	// 	var panel = this.nextElementSibling;

	// 	if (panel.style.display === "block") {

	// 	panel.style.display = "none";

	// 	} else {

	// 	panel.style.display = "block";

	// 	}

	// });

	// }



	// var x = document.getElementsByClassName("horse-accordion");

	// var acc = document.getElementsByClassName("horse-accordion-control");

	// var i;



	// for (i = 0; i < acc.length; i++) {

	// x[i].addEventListener("click", function() {

	// 	this.classList.toggle("active");

	// 	var panel = this.nextElementSibling;

	// 	if (panel.style.display === "block") {

	// 	panel.style.display = "none";

	// 	} else {

	// 	panel.style.display = "block";

	// 	}

	// });

	// }



	$('.accordion').on('click', function(event) {

		event.preventDefault();



		if ( $(this).next('.panel').css('display') == 'none') {

			$('.panel').hide();

			$(this).next('.panel').show();

		}else{

			$('.panel').hide();

		}

		

	});



	$(document).on('click', '.horse-accordion-control', function(event) {

		event.preventDefault();

		/* Act on the event */

		if ($(this).closest('.horse-accordion').next('.stats-panel').css('display') == 'none') {

			$('.stats-panel').hide();

			$(this).closest('.horse-accordion').next('.stats-panel').show();

		}else{

			$('.stats-panel').hide();

		}

	});



	$(document).on('click', '.tipster-one', function(event) {

		event.preventDefault();

		

		if ($(this).closest('.horse-accordion').find('.green-tip').css('display')  == 'none') {

			$('.tip-area').hide();

			$(this).closest('.horse-accordion').find('.green-tip').show();

		}else{

			$('.tip-area').hide();

		}

		

	});



	$(document).on('click', '.tipster-two', function(event) {

		event.preventDefault();

		

		if ($(this).closest('.horse-accordion').find('.red-tip').css('display')  == 'none') {

			$('.tip-area').hide();

			$(this).closest('.horse-accordion').find('.red-tip').show();

		}else{

			$('.tip-area').hide();

		}

		

	});



	$(document).on('click', '.tipster-three', function(event) {

		event.preventDefault();

		

		if ($(this).closest('.horse-accordion').find('.blue-tip').css('display')  == 'none') {

			$('.tip-area').hide();

			$(this).closest('.horse-accordion').find('.blue-tip').show();

		}else{

			$('.tip-area').hide();

		}

		

	});





	$(document).on('click', '.btn-checkout-dp', function(event) {



		



		$.ajax({

			url: '../../dotransaction',

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	"transId"          : $('#transId').val(),

				"transAmount"      : $('#transamount').val(),

				"transDescription" : $('#transDetails').val(),

				"transEmail"       : $('#email').val(),

				_token: $('meta[name="csrf-token"]').attr('content')},

		})

		.done(function (response) {

			console.log(response);

			alert('For Security Purposes. Please do not close the window. It will autoclose after a minute.');

			var zzzz = window.open(response.data, "popupWindow", "width=600,height=600,scrollbars=yes,toolbar=no, menubar=no, location=no, addressbar=no");



			setTimeout(function(){

			    zzzz.close();

			    $('.overlay-main').show();

			    getStatus( $('#transId').val(), $('#transamount').val() );

			},30000);

			

		});



	});



	function getStatus( _transId, _amount){

		$.ajax({

			url: '../../gettransstatus',

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	"transId" : _transId,

		      	"amount"  : _amount,

				_token: $('meta[name="csrf-token"]').attr('content')},

		})

		.done(function (response) {

			console.log(response);

			

			var curUrl = window.location.href+'/'+response.data;



			window.location.href = curUrl;

		});

	}







	$('input[type=checkbox][name=subamt]').on('change', function() {



		$('.start-date').hide();

		$('.end-date').hide();







		if ($(this).is(':checked')) {

			$('.non-pro').prop('checked',false);

			$(this).prop('checked', true);

			if ($(this).val() == 'one') {

				$('.start-date').show().addClass('active');

			}else if ($(this).val() == 'two') {

				$('.start-date').show().addClass('active');

				$('.end-date').show().addClass('active');

			}



			$('.dpackage').html('').html($(this).attr('target-opt'));

			$('.total-d-amt').html('').html($(this).attr('target-amt'));

		}else{

			$(this).prop('checked', false);

			$(this).removeAttr("checked");

			$('.dpackage').html('');

			$('.total-d-amt').html(0);

		}

		subscriptionTotal();

	});



	$('input[type=checkbox][name=subpro]').on('change', function() {



		if ($(this).is(':checked')) {

			$('.pro').prop('checked',false);

			$(this).prop('checked', true);

			$('.ppackage').html('').html($(this).attr('target-opt'));

			$('.total-p-amt').html('').html($(this).attr('target-amt'));

		}else{

			$(this).prop('checked', false);

			$('.ppackage').html('');

		$('.total-p-amt').html(0);

		}



		

		subscriptionTotal();

	});



	function subscriptionTotal(){

		let a1 = $('.total-d-amt').html(),

			a2 = $('.total-p-amt').html();



		var atotal = 0;



		atotal = parseInt(a1) + parseInt(a2);



		$('.total-amt').html('').html(atotal);
		$('#subs-packages-amount').html(atotal);



		if ($('.balance').find('p').html() < atotal) {

			$('.error-funds').show();

			$('.btn-subscribe').prop('disabled', true);

		}else{

			$('.error-funds').hide();

			$('.btn-subscribe').prop('disabled', false);

		}

	

	}



	function myFunction() {

	  var txt;

	  var r = true; //confirm("Are you sure you want to avail this race program?");

	  if (r == true) {

	    let a = $('.dpackage').html(),

			b = '',

			tAmount = $('.total-amt').html(),

			pPackage = $('.ppackage').html(),

			dPackage = $('.dpackage').html();



		if (a == '1 Day') {

			if ($('.start-date').val() == '') {

				alert('Please Provide Subscription Date');

				return false;

			}

		}else if (a == '2 Days') {

			if ($('.start-date').val() == '' || $('.end-date').val() == '') {

				alert('Please Provide Subscription Date');

				return false;

			}

		}



		

		$.ajax({

			url: 'subscribe',

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	"totalAmount" : tAmount,

		      	"proPack"  : pPackage,

		      	"nproPack"  : dPackage,

		      	"fDate"  : $('.start-date').val(),

		      	"sDate"  : $('.end-date').val(),

				_token: $('meta[name="csrf-token"]').attr('content')},

		})

		.done(function (response) {

			console.log(response);

			//location.reload();

			$('#modal-subscription-package-confirmation').modal('toggle');
			$('#modal-subscription-package-successful').modal('toggle');

		});

	  } else {

	    location.reload();

	  }

	  

	}





	// $(document).on('click', '.btn-subscribe', function(event) {



	// 	myFunction();



	// });

	$('#subs-packages-btn-purchase').on('click', () => {
		myFunction();
	});



	$(document).on('click', '.btn-r-res', function(event) {

		$('.hid-btn-cur').hide();

		$('.hid-panel-cur').hide();

		$('.hid-btn').show();

		$('.announcement').hide();

	});





	$(document).on('click', '.btn-r-cur', function(event) {

		$('.hid-btn').hide();

		$('.hid-btn-cur').show();

		$('.announcement').show();

	});



	$(document).on('click', '.btn-date-switch', function(event) {



		$('.btn-date-switch').removeClass('active');

		$(this).addClass('active');



	});



	$(document).on('click', '.show-subscribe', function(event) {

		$('.coin-purchase').show();

		$('.calendar-empty').hide();

	});











	function hasRaceAndResult( _date ){

		$.ajax({

			url: 'checkhasrace',

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	"activeDate": activeDate,

				_token: $('meta[name="csrf-token"]').attr('content')},

		})

		.done(function (response) {



			console.log(response.data);

			$.each(response.data, function(k, v) {

				

			});

		

		});

	}







	function checkdailysubscription( _targetDate, _activeId ){



		let curUrl = window.location.href,

			result = /[^/]*$/.exec(curUrl)[0],

			d = new Date(result);



		var _url = d.toString() === 'Invalid Date'? 'checkdailysub' : '../checkdailysub',

			returnPage = d.toString() === 'Invalid Date'? "home/"+_targetDate : "../home/"+_targetDate



		$.ajax({

			url: _url,

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	"targetDate" : _targetDate,

		      	"activeId"   : _activeId,

				_token: $('meta[name="csrf-token"]').attr('content')},

		})

		.done(function (response) {



			console.log(response.data);

			if (response.data == 0) {

				alert("Please Subscribed to that date to view Program!");

			}else{

				window.location.replace(returnPage);

			}

		

		});



	}



	function checkmonthlysubscription( _targetDate, _activeId ){



		let curUrl = window.location.href,

			result = /[^/]*$/.exec(curUrl)[0],

			d = new Date(result);



		var _url = d.toString() === 'Invalid Date'? 'checkprosub' : '../checkprosub',

			returnPage = d.toString() === 'Invalid Date'? "home/"+_targetDate : "../home/"+_targetDate



		$.ajax({

			url: _url,

	        method: "POST",

	        dataType: 'json',

		      data: {

		      	"targetDate" : _targetDate,

		      	"activeId"   : _activeId,

				_token: $('meta[name="csrf-token"]').attr('content')},

		})

		.done(function (response) {



			console.log(response.data);

			if (response.data == 0) {

				alert("Please Subscribed to that date to view Program or Subscribe to Pro!");

			}else{

				// alert("REGISTERED. YOU CAN VIEW IT.");

				window.location.replace(returnPage);

			}

		

		});

	}



	



/* Google maps controls  */

	$(document).on('change','#_province',function(e){

		e.preventDefault();

		var _province = $(this).val(),

			_sel = $('#_city');



		$.ajax({

			url:'getMapCity',

			method:'GET',

			data: {

				'_province':_province,

				_token: $('meta[name="csrf-token"]').attr('content')



			},

			dataType:'JSON',

			success:function(city) {

				_sel.empty();

				_sel.append("<option>Select City</option>")

				$.each(city.data, function(k, v) {

					_sel.append(

						"<option>"+v['city']+"</option>"

					)

				});

			}

		});

			

				

	});



	$(document).on('change','#_city',function(e) {

		e.preventDefault();



		var _province = $('#_province').val(),

			_city = $(this).val(),

			_div = $('#mapAddress');



		$.ajax({

			url:'getAddress',

			method:'GET',

			data: {

				'_province':_province,

				'_city':_city,

				_token: $('meta[name="csrf-token"]').attr('content')



			},

			dataType:'JSON',

			success:function(address) {

				_div.empty();

				$.each(address.data, function(k, v) {

					_div.append(

						//"<div class='row block-layer-result' >" +

							"<div class='result-items white _mapTargetAddress'  data-address ='"+v['address']+"' data-longitude ='"+v['longitude']+"' data-latitude ='"+v['latitude']+"'>" +

								//"<i class='fa fa-angle-right'>&nbsp</i>" +

								"<span>"+v['address']+"</span>"+

							"</div>"

						//"</div>"

					)

				});

				

				initMap(address.data);

			}

		});

		

	});



	function initMap(locations) {

	

		// console.log(locations[0]);

		

		

		var map = new google.maps.Map(document.getElementById('map'), {

			center: new google.maps.LatLng(locations[0]['latitude'], locations[0]['longitude']),

			// { lat: 13.79242948856351, lng: 121.06090833693067 },

			zoom: 11,

			mapTypeId: google.maps.MapTypeId.ROADMAP

		});

		var infowindow = new google.maps.InfoWindow();

	

		var marker, i;

		// console.log(location[0][0]);

		$.each(locations,function(k,v){

			marker = new google.maps.Marker({

				position: new google.maps.LatLng(v['latitude'], v['longitude']),

				map: map,

				title: v['address'],

				

			});

			marker.setMap(map);

			

		});

		  

	}



	$(document).on('click','._mapTargetAddress',function(e){

		e.preventDefault();



		// let x = $(this).closest('span')

		var xlng = $(this).attr('data-longitude'),

		xlat = $(this).attr('data-latitude'),

		xadd = $(this).attr('data-address');

		

		$('._mapTargetAddress').addClass('white').removeClass('active-result');



		$(this).addClass('active-result').removeClass('white');



		// console.log(xlng);

		mapFocus(xlng,xlat,xadd);

	})



	function mapFocus(xlongitude,xlatitude,xaddress) {

		// console.log(xlongitude,xlatitude,xaddress)

		var map = new google.maps.Map(document.getElementById('map'), {

			center: new google.maps.LatLng(xlatitude, xlongitude),

			// { lat: 13.79242948856351, lng: 121.06090833693067 },

			zoom: 11,

			mapTypeId: google.maps.MapTypeId.ROADMAP

		});

		var infowindow = new google.maps.InfoWindow();

	

		var marker

		// console.log(location[0][0]);

	

			marker = new google.maps.Marker({

				position: new google.maps.LatLng(xlatitude,xlongitude),

				map: map,

				title: xaddress,

				

		

			

			

		});

		

	}





	$(document).on('click','.accHome',function(e){

		e.preventDefault();



		// var _aria = $(this).attr('aria-expanded');

		

		// if (_aria == 'true') {

			

		// 	$(this).closest('.btn-block').addClass('active-results');

		// 	$(this).closest('i').addClass('fa-minus').removeClass('fa-plus');	

		// }

		// else {

			

		// 	$('.accHome').removeClass('active-result');

		// }

	})

	

	

























































	function isDate(dateVal) {

	  var d = new Date(dateVal);

	  return d.toString() === 'Invalid Date'? false: true;

	}













	



















	;(function ($, window, undefined) {

	"use strict";



	//START LOADING





	$.ciCalendar = function (options, element) {

		this.$el = $(element);

		this._init(options);

	};



	// set the calendars default options

	$.ciCalendar.defaults = {

		// array of the different days of the week

		// 'days' for the full string of each day

		// '_days' for the abbreviation of each day

		days: [

			"Sunday",

			"Monday",

			"Tuesday",

			"Wednesday",

			"Thursday",

			"Friday",

			"Saturday"

		],

		_days: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],



		// array of the different months of the year

		// 'months' for the full string of each month

		// '_months' for the abbreviation of each month

		months: [

			"January",

			"February",

			"March",

			"April",

			"May",

			"June",

			"July",

			"August",

			"September",

			"October",

			"November",

			"December"

		],

		_months: [

			"Jan",

			"Feb",

			"Mar",

			"Apr",

			"May",

			"Jun",

			"Jul",

			"Aug",

			"Sep",

			"Oct",

			"Nov",

			"Dec"

		],



		// toggle abbreviations for

		// how days are displayed

		abbr_days: false,



		// toggle abbreviations for

		// how months are displayed

		abbr_months: false,



		// set the left most day in the calendar

		// 0 for sunday, 1 for monday, etc.

		start_day: 0,



		events: {},



		// event handler for when a day (in the current month) is clicked

		dateClick: function ($el, $content, dateProperties) {

			return false;

		}

	};



	// begin the prototype

	$.ciCalendar.prototype = {

		/*

		 * _init

		 *

		 * Sets the default options into place

		 * and initializes the calendar.

		 *

		 * @param options

		 *

		 */



		_init: function (options) {

			// set the prototype options

			// pulls from defaults unless manually changed

			this.options = $.extend(true, {}, $.ciCalendar.defaults, options);



			// set todays date

			this.today = new Date();





			// set the current month

			this.month =

				isNaN(this.options.month) || this.options.month == null

					? this.today.getMonth()

					: this.options.month - 1;



			// set the current year

			this.year =

				isNaN(this.options.year) || this.options.year == null

					? this.today.getFullYear()

					: this.options.year;



			// set the data array

			this.data = this.options.data || {};



			// generate the calendar template

			this._generate();



			// initialize the events

			this._initEvents();

		},



		/*

		 * _initEvents

		 *

		 * Initializes global events such as

		 * calendar cell clicks.

		 *

		 */



		_initEvents: function () {

			// internalize

			var self = this;



			// handle calendar cell click events

			this.$el.on("click.calendar", "div.ci-row > div", function () {

				var $cell = $(this),

					idx = $cell.index(),

					$content = $cell.children("div"),

					dateProp = {

						day: $cell.children("span.ci-date").text(),

						month: self.month + 1,

						monthname: self.options.abbr_months

							? self.options._months[self.month]

							: self.options.months[self.month],

						year: self.year,

						weekday: idx + self.options.start_day - 2,

						weekdayname: self.options.days[idx + self.options.start_day - 2]

					};



				if (dateProp.day) {

					self.options.dateClick($cell, $content, dateProp);

				}

			});

		},



		/*

		 * _generate

		 *

		 * Generates a fresh view of the calendar

		 * based on the current year and month.

		 *

		 * @param callback

		 * @return dom

		 *

		 */



		_generate: function (callback) {

			var head = this._getHead(),

				body = this._getDays(),

				rowClass;



			switch (this.rowTotal) {

				case 4:

					rowClass = "cal-rows-four";

					break;

				case 5:

					rowClass = "cal-rows-five";

					break;

				case 6:

					rowClass = "cal-rows-six";

					break;

			}



			this.$cal = $('<div class="ci-calendar ' + rowClass + '">').append(

				head,

				body

			);

			this.$el.find("div.ci-calendar").remove().end().append(this.$cal);



			if (callback) {

				callback.call();

			}

		},



		/*

		 * _getHead

		 *

		 * Generates the weekday strings in the header

		 * of the calendar. Order of weekdays is based

		 * on the options.start_day parameter.

		 *

		 * @return html

		 *

		 */



		_getHead: function () {

			var html = '<div class="ci-head">';



			for (var i = 0; i <= 6; i++) {

				var pos = i + this.options.start_day,

					j = pos > 6 ? pos - 6 - 1 : pos;



				html += "<div>";

				html += this.options.abbr_days

					? this.options._days[j]

					: this.options._days[j];

				html += "</div>";

			}



			html += "</div>";



			return html;

		},



		/*

		 * _getDays

		 *

		 * Generates the rest of the calendar.

		 * Creates 6 rows, each containing 7 cells.

		 * Cross-checks which day the month starts

		 * and ends on and fills the cells accordingly.

		 *

		 * @return html

		 *

		 */



		_getDays: function () {

			var d = new Date(this.year, this.month + 1, 0),

				monthLength = d.getDate(),

				firstDay = new Date(this.year, this.month, 1);







			// get the starting dat of the month

			this.startingDay = firstDay.getDay();



			// start creating the html output for the calendar cells

			var html =

					'<div class="ci-body" data-month="' +

					(this.month + 1) +

					'"><div class="ci-row" data-week="1">',

				day = 1;



			

			// getTrack( this.today.getFullYear() + '-' + (this.today.getMonth()+1));

			

			







			// loop through the weekdays

			for (var i = 0; i < 7; i++) {



				// add containers for events

				for (var k = 0; k < 2; k++) {

					html +=

						'<span class="ci-event-row" data-event-row="' + (k + 1) + '"></span>';

				}





				// loop through week rows

				for (var j = 0; j <= 6; j++) {

					var pos = this.startingDay - this.options.start_day,

						p = pos < 0 ? 6 + pos + 1 : pos,

						inner = "",

						today =

							this.month === this.today.getMonth() &&

							this.year === this.today.getFullYear() &&

							day === this.today.getDate() - 1,

						content = "";



						/*PASOK DITO HUGUTIN ANG TRACKS*/



						





					if (day <= monthLength && (i > 0 || j >= p)) {

						html +=

							'<div class="' +

							cellClasses +

							'" data-month="' +

							(this.month + 1) +

							'" data-day="' +

							day +

							'" data-events="0" style="z-index: 99">';

							

							var aaa = this.today.getFullYear(),

								bbb = this.month + 1,

								ccc = day,

								ddd = "",

								eee = "",

								fff = "",

								ggg = "";



							let curUrl = window.location.href,

								result = /[^/]*$/.exec(curUrl)[0],

								d = new Date(result);



							var _url = d.toString() === 'Invalid Date'? 'gettrack' : '../gettrack';





							console.log(_url);



							$.ajax({

								url: _url,

						        method: "POST",

						        dataType: 'json',

						        async : false,

							      data: {

							      	"activeDate": this.today.getFullYear() + '-' + (this.month + 1) + '-' + day,

									_token: $('meta[name="csrf-token"]').attr('content')},

							})

							.done(function (response) {

								// console.log(response.data);

								$.each(response.data, function(k, v) {



									let asdada = aaa + '-' + (bbb.toString().length == 1 ? '0'+bbb : bbb) + '-' + ccc;



									console.log(asdada.toString()+"----"+v['r_date']);



									if (v['r_date'] == asdada.toString()) {

										ddd = v['r_track'];

										eee = (v['resCount'] == 0 ? "NULL" : v['resCount']);

										fff = (v['r_date'] >= (aaa + '-' + (bbb.toString().length == 1 ? '0'+bbb : bbb) + '-' + ccc) ? v['id'] : "NULL");

										

										return false;

									}else{

										// $(this).attr('target-result', 0);

										

										ddd = "";

										eee = (v['resCount'] == 0 ? "NULL" : v['resCount']);

										fff = (v['r_date'] >= (aaa + '-' + (bbb.toString().length == 1 ? '0'+bbb : bbb) + '-' + ccc) ? v['id'] : "NULL");

										

									}

									

								});

							});

               			

						

						if (ddd.length == 3) {

							if (eee == "NULL") {

								if (fff != "NULL") {

									inner += '<span class="ci-date"><k class="race-prog"></k><z>' + day + "</z></span><br><b style='margin-left: 30px;font-size: 13px;color: blue'>"+ddd+"</b>";

								}else{

									inner += '<span class="ci-date"><z>' + day + "</z></span><br><b style='margin-left: 30px;font-size: 13px;color: blue'>"+ddd+"</b>";

								}

							}else{

								inner += '<span class="ci-date"><k class="race-res"></k><z>' + day + "</z></span><br><b style='margin-left: 30px;font-size: 13px;color: blue'>"+ddd+"</b>";

							}

							

						}else{

							if (eee == "NULL") {

								if (fff != "NULL") {

									inner += '<span class="ci-date"><k class="race-prog"></k><z>' + day + "</z></span><br><b style='margin-left: 25px;font-size: 12px;color: blue'>"+ddd+"</b>";

								}else{

									inner += '<span class="ci-date"><z>' + day + "</z></span><br><b style='margin-left: 30px;font-size: 13px;color: blue'>"+ddd+"</b>";

								}

							}else{

								inner += '<span class="ci-date"><k class="race-res"></k><z>' + day + "</z></span><br><b style='margin-left: 25px;font-size: 12px;color: blue'>"+ddd+"</b>";

							}

							

						}



						// inner += '<span class="ci-date"><z>' + day + "</z></span><br><b style='margin-left: 25px;font-size: 12px;color: blue'>AAAAAAAA</b>";

						



						var strdate =

								(this.month + 1 < 10 ? "0" + (this.month + 1) : this.month + 1) +

								"-" +

								(day < 10 ? "0" + day : day) +

								"-" +

								this.year,

							dayData = this.data[strdate];



						if (dayData) {

							content = dayData;

						}



						if (content !== "") {

							inner += '<div class="empty">' + content + "</div>";

						}



						++day;

					} else {

						html += '<div class="empty">';



						today = false;

					}







					var cellClasses = today ? 'ci-today ci-clickable' : 'ci-clickable'



					



					// if (eee > 0) {

					// 	cellClasses += " ci-w-result ";

					// }





					if (content !== "") {

						cellClasses += "ci-content ";

					}



					html += inner;

					html += "</div>";

				}



				if (day > monthLength) {

					this.rowTotal = i + 1;

					break;

				} else {

					html += '</div><div class="ci-row" data-week="' + (i + 2) + '">';

				}





				



			}



			html += "</div></div>";



			// let curUrl = window.location.href,

			// 					result = /[^/]*$/.exec(curUrl)[0];



			// // var _url = dd.toString() !== 'Invalid Date'? 'gettrack' : '../gettrack';



			// if (result != 'home' || _url != 'home#') {

			// 	var t = curUrl.substr(0, curUrl.lastIndexOf("/"));

			// 	history.pushState({}, null, t);

			// }

 	



			return html;







			//HIDE LOADING

		},



		/*

		 * _isValidDate

		 *

		 * Referenced from http://stackoverflow.com/a/8390325/989439

		 *

		 * Let's make sure the date being passed through is valid.

		 * Checks day values, month values, leap years, etc.

		 *

		 * @param date

		 * @return array

		 *

		 */



		_isValidDate: function (date) {

			// change date to 'MMDDYYYY' format

			date = date.replace(/-/gi, "");



			// seperate the date string into vars

			var month = parseInt(date.substr(0, 2), 10),

				day = parseInt(date.substr(2, 4), 10),

				year = parseInt(date.substr(4, 8), 10);



			// is the month between 1 and 12?

			if (month < 1 || month > 12) {

				return false;



				// is the dat between 1 and 31?

			} else if (day < 1 || day > 31) {

				return false;



				// there are only 30 days in April, June, September, and November

			} else if (

				(month == 4 || month == 6 || month == 9 || month == 11) &&

				day > 30

			) {

				return false;



				// check for leap years

			} else if (

				month == 2 &&

				(year % 400 == 0 || year % 4 == 0) &&

				year % 100 != 0 &&

				day > 29

			) {

				return false;



				// double check for leap years

			} else if (month == 2 && year % 100 == 0 && day > 29) {

				return false;

			}



			return {

				day: day,

				month: month,

				year: year

			};

		},



		/*

		 * _clearEvents

		 *

		 * Move the calendar between months and years.

		 * The movement is based on the period and dir

		 * values that are passed into the function.

		 * Period values can be either 'month' or 'year'

		 * and the Dir values 'previous' or 'next'.

		 *

		 */



		_clearEvents: function () {

			// $(".ci-event").remove();

			// $(".ci-row > div").attr("data-events", 0);

			$(".ci-row > div").css("z-index", 99);

			// $(".ci-row > div").attr("onclick", 'myFunction()');

		},



		/*

		 * _updateEvents

		 *

		 * Move the calendar between months and years.

		 * The movement is based on the period and dir

		 * values that are passed into the function.

		 * Period values can be either 'month' or 'year'

		 * and the Dir values 'previous' or 'next'.

		 *

		 * @param array

		 *

		 */



		_updateEvents: function (_events) {

			this._clearEvents();



			// console.log(_events);



			// calculate the number of days between

			// two supplied dates in mm/dd/yyyy format

			Date.prototype.diffDates = function () {

				var mill = 24 * 60 * 60 * 1000,

					diff = arguments[0] - this,

					days = Math.floor(diff / mill);



				return days; // add 1 to include the first day

			};



			// loop through each event supplied in

			// the _events object when the function is called

			$.each(_events, function (index, _event) {

				// define the dom elements we'll need

				var $_event_start_day = $(

						'.ci-row > div[data-day="' + _event.start["day"] + '"]'

					),

					$_event_finish_day = $(

						'.ci-row > div[data-day="' + _event.end["day"] + '"]'

					),

					$_event_start_week = $_event_start_day.parent(),

					$_event_finish_week = $_event_finish_day.parent(),

					$_event_start_cells = new Array(),

					$_event_finish_cells = new Array();



				// define the start date, end date, and number days between them

				var _dateStart = new Date(

						_event.start["month"] +

							"/" +

							_event.start["day"] +

							"/" +

							_event.start["year"]

					),

					_dateFinish = new Date(

						_event.end["month"] + "/" + _event.end["day"] + "/" + _event.end["year"]

					),

					_startPos = $_event_start_day.index() - 1,

					_finishPos = $_event_finish_day.index() - 1,

					_totalDays = _dateStart.diffDates(_dateFinish);



				// define the widths of needed elements

				var _blockWidth = Math.floor($(".ci-row > div").width()), // width of each day in pixels

					_eventWidth = _blockWidth * _totalDays, // total width of the event in pixels

					_eventHeight = Math.floor($(".ci-event-row").outerHeight() / 2 - 4.5), // get the events height

					_daysWidth = _blockWidth * 7, // total width of the calendar in pixels

					_eventOffset = _startPos * _blockWidth - _blockWidth,

					_eventTotals = _eventWidth + _eventOffset,

					_eventLeftover = _eventTotals - _daysWidth;



				$_event_start_day.addClass("start");



				// make sure the event matches the currently

				// viewed year and month before appending to calendar

				if (

					_event.start["year"] == calendar.year &&

					_event.start["month"] == calendar.month + 1

				) {

					for (var i = _event.start["day"]; i <= _event.end["day"]; i++) {

						var j = $('.ci-row > div[data-day="' + i + '"]').attr("data-events");



						j++;



						$('.ci-row > div[data-day="' + i + '"]').attr("data-events", j);



					}



					if (_eventTotals > _daysWidth) {

						// this event is long and will carry into the next row



						$_event_start_week.find(".ci-event-row").each(function (i, el) {

							$_event_start_cells.push(el);

						});



						$_event_finish_week.find(".ci-event-row").each(function (i, el) {

							$_event_finish_cells.push(el);

						});



						var _eventDifference = _eventTotals - _daysWidth,

							_eventToDraw = _eventTotals - _eventOffset - _eventDifference;



						var html_one = '<span class="ci-event private';

						html_one += '" style="left:' + (_eventOffset + 6) + "px;";

						html_one += "width:" + (_eventToDraw - _eventHeight - 3) + 'px;">';



						html_one += '<span class="end-cap" style="';

						html_one +=

							"right:-" +

							Math.floor(_eventHeight / 1.5) +

							"px; border-width: " +

							_eventHeight +

							"px 0px " +

							_eventHeight +

							"px " +

							Math.floor(_eventHeight / 1.5) +

							"px;";

						html_one += '"></span>';



						html_one += '<span class="end-cap-border" style="';

						html_one +=

							"right:-" +

							Math.floor(_eventHeight / 1.5 + 2) +

							"px; border-width: " +

							(_eventHeight + 2) +

							"px 0px " +

							(_eventHeight + 2) +

							"px " +

							Math.floor(_eventHeight / 1.5 + 2) +

							"px;";

						html_one += '"></span>';



						html_one +=

							"<label>" +

							_event.details["title"] +

							"<br>starts: " +

							_event.start["month"] +

							"/" +

							_event.start["day"] +

							", ends: " +

							_event.end["month"] +

							"/" +

							_event.end["day"] +

							"...</label>";

						html_one += "</span>";



						if ($_event_start_day.attr("data-events") <= 1) {

							$($_event_start_cells[0]).append(html_one);

						} else if ($_event_start_day.attr("data-events") >= 1) {

							$($_event_start_cells[1]).append(html_one);

						} else if ($_event_start_day.attr("data-events") > 1) {

							console.log("view more");

						}



						if (_event.end["month"] === _event.start["month"]) {

							var html_two = '<span class="ci-event private';

							html_two += '" style="left:' + (_eventHeight + 6) + "px;";

							html_two +=

								"width:" +

								(_eventDifference - _eventHeight + _blockWidth - 9) +

								'px;">';



							html_two += '<span class="start-cap" style="';

							html_two +=

								"left:-" +

								Math.floor(_eventHeight / 1.5) +

								"px; border-width: " +

								_eventHeight +

								"px " +

								Math.floor(_eventHeight / 1.5) +

								"px " +

								_eventHeight +

								"px 0px;";

							html_two += '"></span>';



							html_two += '<span class="start-cap-border" style="';

							html_two +=

								"left:-" +

								Math.floor(_eventHeight / 1.5 + 2) +

								"px; border-width: " +

								(_eventHeight + 2) +

								"px " +

								Math.floor(_eventHeight / 1.5 + 2) +

								"px " +

								(_eventHeight + 2) +

								"px 0px;";

							html_two += '"></span>';



							html_two +=

								"<label>..." +

								_event.details["title"] +

								"<br>starts: " +

								_event.start["month"] +

								"/" +

								_event.start["day"] +

								", ends: " +

								_event.end["month"] +

								"/" +

								_event.end["day"] +

								"</label>";

							html_two += "</span>";



							if ($_event_start_day.attr("data-events") <= 1) {

								$($_event_finish_cells[0]).append(html_two);

							} else if ($_event_start_day.attr("data-events") >= 1) {

								$($_event_finish_cells[1]).append(html_two);

							} else if ($_event_start_day.attr("data-events") > 1) {

								console.log("view more");

							}

						}

					} else {

						// this event fits within its starting row



						$_event_start_week.find(".ci-event-row").each(function (i, el) {

							$_event_start_cells.push(el);

						});



						var html = '<span class="ci-event public';

						html += '" style="left:' + (_eventOffset + 6) + "px;";



						if (_event.start["month"] != _event.end["month"]) {

							html +=

								"width:" + (_eventWidth - _eventHeight + _blockWidth - 5) + 'px;">';



							html += '<span class="end-cap" style="';

							html +=

								"right:-" +

								Math.floor(_eventHeight / 1.5) +

								"px; border-width: " +

								_eventHeight +

								"px 0px " +

								_eventHeight +

								"px " +

								Math.floor(_eventHeight / 1.5) +

								"px;";

							html += '"></span>';



							html += '<span class="end-cap-border" style="';

							html +=

								"right:-" +

								Math.floor(_eventHeight / 1.5 + 2) +

								"px; border-width: " +

								(_eventHeight + 2) +

								"px 0px " +

								(_eventHeight + 2) +

								"px " +

								Math.floor(_eventHeight / 1.5 + 2) +

								"px;";

							html += '"></span>';

						} else {

							html += "width:" + (_eventWidth + _blockWidth - 5) + 'px;">';

						}



						html +=

							"<label>" +

							_event.details["title"] +

							"<br>starts: " +

							_event.start["month"] +

							"/" +

							_event.start["day"] +

							", ends: " +

							_event.end["month"] +

							"/" +

							_event.end["day"] +

							"</label>";

						html += "</span>";



						if ($_event_start_day.attr("data-events") <= 1) {

							$($_event_start_cells[0]).append(html);

						} else if ($_event_start_day.attr("data-events") >= 1) {

							$($_event_start_cells[1]).append(html);

						} else if ($_event_start_day.attr("data-events") > 1) {

							console.log("view more");

						}

					}

				} else if (

					_event.end["year"] == calendar.year &&

					_event.end["month"] == calendar.month + 1

				) {

					// this event is being carried over from the previous month



					$_event_finish_week.find(".ci-event-row").each(function (i, el) {

						$_event_finish_cells.push(el);

					});



					var _newStartPos =

							_finishPos - _totalDays > 1 ? _finishPos - _totalDays : 1,

						_newStartPos = _newStartPos * _blockWidth - _blockWidth,

						_newEventWidth = _blockWidth * _finishPos - _blockWidth;



					var html = '<span class="ci-event public';

					html += '" style="left:' + (_newStartPos + _eventHeight + 6) + "px;";

					html += "width:" + (_newEventWidth - _eventHeight - 5) + 'px;">';



					html += '<span class="start-cap" style="';

					html +=

						"left:-" +

						Math.floor(_eventHeight / 1.5) +

						"px; border-width: " +

						_eventHeight +

						"px " +

						Math.floor(_eventHeight / 1.5) +

						"px " +

						_eventHeight +

						"px 0px;";

					html += '"></span>';



					html += '<span class="start-cap-border" style="';

					html +=

						"left:-" +

						Math.floor(_eventHeight / 1.5 + 2) +

						"px; border-width: " +

						(_eventHeight + 2) +

						"px " +

						Math.floor(_eventHeight / 1.5 + 2) +

						"px " +

						(_eventHeight + 2) +

						"px 0px;";

					html += '"></span>';



					html +=

						"<label>" +

						_event.details["title"] +

						"<br>starts: " +

						_event.start["month"] +

						"/" +

						_event.start["day"] +

						", ends: " +

						_event.end["month"] +

						"/" +

						_event.end["day"] +

						"</label>";

					html += "</span>";



					$($_event_finish_cells[0]).append(html);

				}

			});

		},



		/*

		 * _move

		 *

		 * Move the calendar between months and years.

		 * The movement is based on the period and dir

		 * values that are passed into the function.

		 * Period values can be either 'month' or 'year'

		 * and the Dir values 'previous' or 'next'.

		 *

		 * @param period

		 * @param dir

		 * @param callback

		 *

		 */



		_move: function (period, dir, callback) {

			// take a step back

			if (dir === "previous") {

				// go back a month

				if (period === "month") {

					if (this.month > 0) {

						this.month = --this.month;

					} else {

						this.month = 11;

						this.year = --this.year;

					}



					// go back a year

				} else if (period === "year") {

					this.year = --this.year;

				}



				// put your best foot forward

			} else if (dir === "next") {

				// go forward a month

				if (period === "month") {

					if (this.month < 11) {

						this.month = ++this.month;

					} else {

						this.month = 0;

						this.year = ++this.year;

					}



					// go forward a year

				} else if (period === "year") {

					this.year = ++this.year;

				}

			}



			this._generate(callback);

		},



		/*

		 * _getYear

		 *

		 * Return the current calendar year

		 * @return int

		 *

		 */



		_getYear: function () {

			return this.year;

		},



		/*

		 * _getMonth

		 *

		 * Return the current calendar month

		 * @return int

		 *

		 */



		_getMonth: function () {

			return this.month + 1;

		},



		_getNextMonth: function () {

			var next_month = this.month;



			if (next_month < 11) {

				next_month = ++next_month;

			} else {

				next_month = 0;

			}



			return this.options.abbr_months

				? this.options._months[next_month]

				: this.options.months[next_month];

		},



		_getLastMonth: function () {

			var last_month = this.month;



			if (last_month > 0) {

				last_month = --last_month;

			} else {

				last_month = 11;

			}



			return this.options.abbr_months

				? this.options._months[last_month]

				: this.options.months[last_month];

		},



		/*

		 * _getMonthName

		 *

		 * Return the current calendar month

		 * as a string value. Output will be

		 * determined based on abbreviations

		 * being enabled or disabled.

		 *

		 * @return string

		 *

		 */



		_getMonthName: function () {

			return this.options.abbr_months

				? this.options._months[this.month]

				: this.options.months[this.month];

		},



		_getCell: function (day) {

			var row = Math.floor((day + this.startingDay - this.options.start_day) / 7),

				pos = day + this.startingDay - this.options.start_day - row * 7 - 1;



			return this.$cal

				.find("div.ci-body")

				.children("div.ci-row")

				.eq(row)

				.children("div")

				.eq(pos)

				.children("div");

		},



		_setData: function (data) {

			data = data || {};

			$.extend(this.data, data);



			this._generate();

		},



		/*

		 * _gotoNow

		 *

		 * Update the month and year values

		 * to the current date then regenerate

		 * the calendar view.

		 *

		 * @param callback

		 *

		 */



		_gotoNow: function (callback) {

			this.month = this.today.getMonth();

			this.year = this.today.getFullYear();



			this._generate(callback);

		},



		/*

		 * _gotoDate

		 *

		 * Update the calendar to display a

		 * specific month and year based on

		 * the passed values.

		 *

		 * @param month

		 * @param year

		 * @param callback

		 *

		 */



		_gotoDate: function (month, year, callback) {

			this.month = month;

			this.year = year;



			this._generate(callback);

		},



		/*

		 * _gotoNextMonth

		 *

		 * Move the current calendar view

		 * to the upcoming month and then

		 * regenerate the view.

		 *

		 * @param callback

		 *

		 */



		_gotoNextMonth: function (callback) {

			this._move("month", "next", callback);

		},



		/*

		 * _gotoPreviousMonth

		 *

		 * Move the current calendar view

		 * to the previous month and then

		 * regenerate the view.

		 *

		 * @param callback

		 *

		 */



		_gotoPreviousMonth: function (callback) {

			this._move("month", "previous", callback);

		},



		/*

		 * _gotoNextYear

		 *

		 * Move the current calendar view

		 * to the upcoming year and then

		 * regenerate the view.

		 *

		 * @param callback

		 *

		 */



		_gotoNextYear: function (callback) {

			this._move("year", "next", callback);

		},



		/*

		 * _gotoPreviousYear

		 *

		 * Move the current calendar view

		 * to the previous year and then

		 * regenerate the view.

		 *

		 * @param callback

		 *

		 */



		_gotoPreviousYear: function (callback) {

			this._move("year", "previous", callback);

		}

	};



	/*

	 * _errors

	 *

	 * Basic error logging. Passed errors

	 * are logged through the browser console.

	 *

	 * @param message

	 * @return error

	 *

	 */



	var _errors = function (message) {

		if (window.console) {

			window.console.error(message);

		}

	};



	/*

	 * ciCalendar

	 *

	 *

	 * @param options

	 * @return instance

	 *

	 */



	$.fn.ciCalendar = function (options) {

		// begin a new instance of the calendar

		var instance = $.data(this, "ciCalendar");



		// if the options being passed into the calendar

		// are in string format, let's go ahead and split

		// it up into a nice shiny array

		if (typeof options == "string") {

			// shiny new array of arguments

			var args = Array.prototype.slice.call(arguments, 1);



			// loop the arguments

			this.each(function () {

				if (!instance) {

					_errors(

						"cannot call methods on the calendar prior to initialization. " +

							'attempted to call method "' +

							options +

							'"'

					);



					return;

				}



				if (!$.isFunction(instance[options]) || options.charAt(0) === "_") {

					_errors('no such method "' + options + '" for the calendar instance');



					return;

				}



				// valid arguments passed as options

				instance[options].apply(instace, args);

			});

		} else {

			// the options are not being passed as a

			// string. let's parse the passed array

			// and apply them as options



			// loop the arguments

			this.each(function () {

				if (instance) {

					// initialize the existing

					// instance that was passed

					instance._init();

				} else {

					// create a new instance

					// and initialize it afterward

					instance = $.data(this, "ciCalendar", new $.ciCalendar(options, this));

				}

			});

		}



		return instance;

	};

})(jQuery, window);



var calendar = $("#calendar").ciCalendar({

		dateClick: function ($el, $contentEl, dateProperties) {

			console.clear();



			var sDate = '',

				curDay = '',

				preDay = '',

				curMonth = '';



			for (var key in dateProperties) {

				console.log(key + " = " + dateProperties[key]);



				var selectedDay = '',

					selectedMonth = '',

					selectedMon = '',

					selectedYear = '',

					selectedDate = '';

				if (key == 'day') {

					selectedDay = dateProperties[key];

					sDate = selectedDay;

				}



				if (key == 'monthname') {

					selectedMonth = dateProperties[key];

				}



				if (key == 'month') {

					selectedMon = dateProperties[key];

					sDate = sDate + '-' + selectedMon;

				}



				if (key == 'year') {

					selectedYear = dateProperties[key];

					sDate = sDate + '-' + selectedYear;

				}



				// var mydate = new Date(abc);

			}



			// alert(sDate);



			switch(sDate.split('-')[1]) {

			  case '1':

			    curMonth = "January";

			    break;

			  case '2':

			    curMonth = "February";

			    break;

			  case '3':

			    curMonth = "March";

			    break;

			  case '4':

			    curMonth = "April";

			    break;



			  case '5':

			    curMonth = "May";

			    break;

			  case '6':

			    curMonth = "June";

			    break;

			  case '7':

			    curMonth = "July";

			    break;

			  case '8':

			    curMonth = "August";

			    break;

			  case '9':

			    curMonth = "September";

			    break;

			  case '10':

			    curMonth = "October";

			    break;



			  case '11':

			    curMonth = "November";

			    break;

			  case '12':

			    curMonth = "December";

			    break;

			}	



			var selectedDate = sDate.split('-')[2] +'-'+ sDate.split('-')[1] +'-'+ sDate.split('-')[0];

			var curdateWords = curMonth+ ' ' +sDate.split('-')[0]+', '+sDate.split('-')[2];



			console.log(selectedDate);





			

			$('.btn-r-res').find('h5').html('').html(curdateWords);



			// alert($('.active-user-current').attr('target-active-id'));



			// GET DATE TODAY

			var d = new Date(),

			    strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();



			if (strDate < selectedDate) {

				// alert("Check if subscribed on that day");

				checkdailysubscription( selectedDate, $('.active-user-current').attr('target-active-id') );

			}



			if (strDate >= selectedDate) {

				// alert("Check if subscribed for Pro");

				checkmonthlysubscription( selectedDate, $('.active-user-current').attr('target-active-id') );

			}

		}

	}),

	$month = $("#month").html(calendar._getMonthName() + "  " + calendar._getYear()),

	$year = $("#year").html(),

	$last = $("#last").html("<i class='fa-caret-left fas fa-2x'></i>"),

	$next = $("#next").html("<i class='fa-caret-right fas fa-2x'></i>");



var events = [

	(event = {

		details: {

			title: "This is a longer event that breaks into a new row!",

			location: "expo center",

			country: "united states",

			city: "san diego",

			public: true

		},



		start: {

			time: "12:00pm",

			month: 7,

			day: 17,

			year: 2019

		},



		end: {

			time: "12:00pm",

			month: 7,

			day: 26,

			year: 2019

		}

	}),



	(event = {

		details: {

			title: "An event that shares days as another event",

			location: "expo center",

			country: "united states",

			city: "san diego",

			public: true

		},



		start: {

			time: "12:00pm",

			month: 7,

			day: 20,

			year: 2019

		},



		end: {

			time: "12:00pm",

			month: 7,

			day: 23,

			year: 2019

		}

	}),



	(event = {

		details: {

			title: "This is a shorter single row event!",

			location: "expo center",

			country: "united states",

			city: "san diego",

			public: true

		},



		start: {

			time: "12:00pm",

			month: 8,

			day: 1,

			year: 2019

		},



		end: {

			time: "12:00pm",

			month: 8,

			day: 3,

			year: 2019

		}

	}),



	(event = {

		details: {

			title: "Another short event sharing days",

			location: "expo center",

			country: "united states",

			city: "san diego",

			public: true

		},



		start: {

			time: "12:00pm",

			month: 8,

			day: 2,

			year: 2019

		},



		end: {

			time: "12:00pm",

			month: 8,

			day: 5,

			year: 2019

		}

	})

];



calendar._updateEvents(events);



$last.on("click", function () {

	calendar._gotoPreviousMonth(updateMonthYear);

});



$next.on("click", function () {

	calendar._gotoNextMonth(updateMonthYear);

});



$(window).on("resize", function () {

	calendar._updateEvents(events);

});



function updateMonthYear() {

	$month.html(calendar._getMonthName());

	$year.html(calendar._getYear());



	$next.html(calendar._getNextMonth());

	$last.html(calendar._getLastMonth());



	calendar._updateEvents(events);

}



	

});









