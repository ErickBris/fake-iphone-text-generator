$(function () {
	if($("input").is(".switch")) {
		$(".switch").bootstrapSwitch();
	}	
	$("#battery-slider").slider({
		range: "min",
		value: 50,
		min: 1,
		max: 100,
		slide: function (event, ui) {
			$("#battery-slider-amount").val(ui.value + "%");
			$("#battery-percent-number").text(ui.value);
			$("#battery-percent").width(ui.value + "%");
			if (ui.value <= 20) {
				$("#battery-percent").addClass('red')
			} else {
				$("#battery-percent").removeClass('red')
			}
		}
	});
	
	
	$("#battery-slider-amount").val($("#battery-slider").slider("value") + "%");
	$("#wifi-slider").slider({
		range: "min",
		value: 3,
		min: 0,
		max: 3,
		slide: function (event, ui) {
			$("#wifi").attr('src', 'assets/images/wifi-' + ui.value + '.png');
			$("#wifi").attr('src', 'assets/images/wifi-' + ui.value + '.png');
			$("#connection-type-wifi").attr('src', 'assets/images/wifi-' + ui.value + '.png');
			$('input:radio[name=connectionType][value=wifi]').click()
		}
	});
	$("#connection-slider").slider({
		range: "min",
		value: 3,
		min: 0,
		max: 5,
		slide: function (event, ui) {
			$("#connection").attr('src', 'assets/images/3g-' + ui.value + '.png');
			$("#signal-img").attr('src', 'assets/images/3g-' + ui.value + '.png')
		}
	});
	$('#battery-show-percent').on('switchChange.bootstrapSwitch', function (event, state) {		
		if ($(this).is(':checked')) {
			$("#battery-percent-number-container").fadeIn(250)
		} else {
			$("#battery-percent-number-container").fadeOut(250)
		}
	});
	$('#msgs').on('click', '.delete', function () {
		$(this).parent('li').fadeOut(500, function () {
			$(this).remove()
		})
	});
	$(function () {
		$("#msgs").sortable({
			start: function (event, ui) {
				$('#msgs').addClass('dragging');
				$('.delete').remove()
			},
			stop: function (event, ui) {
				$('#msgs').removeClass('dragging')
			}
		});
		$("#msgs").disableSelection()
	});
	$(".inputVal").each(function () {
		$("#" + $(this).attr('id') + "-result").text($(this).val())
	});
	$(".inputVal").keyup(function (e) {
		$("#" + $(this).attr('id') + "-result").text($(this).val());
		if ($(this).attr('id') == 'name' && $(this).val().length > 14 && $(this).val().length <= 20) {
			$("#txt-name").addClass('active')
		} else if ($(this).attr('id') == 'name' && $(this).val().length > 20 && $("#txt-name").hasClass('active')) {
			$("#txt-name").addClass('active');
			$("#name-result").text($("#name-result").text().substr(0, 24) + '...')
		} else {
			$("#txt-name").removeClass('active')
		}
	});
	$('#emoji_list').on('click', '.emoji', function () {
		var $emoji = $(this).attr('data-src');
		var $msg = $('#msg-content').val();
		$('#msg-content').val($msg + ':'+$emoji+':');
	});
	$('#emoji_list_modal').on('click', '.emoji', function () {
		var $emoji = $(this).attr('data-src');
		var $msg = $('#msg-content').val();
		$('#msg-content').val($msg + ':'+$emoji+':');
	});
	$('.sendMessage').click(function () {
		var $color = 'msg ' + $("input[name=sender]:checked").val();
		var $msg = $("#msg-content").val();
		$('#startup-help').fadeOut(500);
		if ($("input[name=sender]:checked").val() == 'transparent') {
			var $color = 'msg-timestamp'
		}
		if ($msg) {
			$msg = $msg.replace(/:(.+?):/gi, '<img src="assets/emojis/$1.png" height="22" wight="22">');
			var newItem = $('<li class="' + $color + '"><div class="delete" style="display:none;"><i class="fa fa-trash-o"></i></div><div class="content"><p>' + $msg + '</p></div><div class="sep"></div></li>');
	
			$("#dlbtn").fadeIn(500);
			if ($('#example-msg').length > 0) {
				$("#example-msg").fadeOut(250, function () {
					var newItem2 = $('<li class="msg-timestamp"><div class="delete" style="display:none;"><i class="fa fa-trash-o"></i></div><div class="content"><p>Today 8:32 AM</p></div><div class="sep"></div></li>');
					$("#example-msg").remove();
					$("#msgs").append(newItem2);
					$("#msgs").append(newItem);
					$w = newItem.width();
					$h = newItem.height();
					$ot = newItem.offset().top;
					$ol = newItem.offset().left;
					newItem.css('top', $ot + 'px').css('left', $ol + 'px').css('width', $w + 'px');
					$w2 = newItem2.width();
					$h2 = newItem2.height();
					$ot2 = newItem2.offset().top;
					$ol2 = newItem2.offset().left;
					newItem2.css('top', $ot2 + 'px').css('left', $ol2 + 'px').css('width', $w2 + 'px');
					$("#msgs").animate({
						scrollTop: $('#msgs-wrapper').height()
					},
					1000)
				});
				$(".example-msg").fadeOut(250);
			} else {
				$("#msgs").append(newItem);
				$w = newItem.width();
				$h = newItem.height();
				$ot = newItem.offset().top;
				$ol = newItem.offset().left;
				newItem.css('top', $ot + 'px').css('left', $ol + 'px').css('width', $w + 'px');
				$("#msgs").animate({
					scrollTop: $('#msgs-wrapper').height()
				},
				1000)
			}
			$("#msg").val('')
		}
	});
	$('input:radio[name=sender]').on('switchChange.bootstrapSwitch', function (event, state) {			
			var $option = $(this).val();
			if($option == 'transparent'){
	 			$('#msg-content').val('Today 8:32 AM');
			} else {
				$('#msg-content').val('');
			}
	});
	if($("input").is("#default_ios_type")) {
		var $option = $('#default_ios_type').val();
		if($option == 'ios8'){
			$('#msg').css('padding-left','0').css('width','400px');
			$('#msg-top').css('width','400px');
			$('#msgs-bottom').css('width','400px').css('background',"url('../assets/images/"+$option+"msgs-bottom.jpg')");
			$('#iphone #top').css('background-image',"url('../assets/images/"+$option+"top.png')");
			$('#iphone #center').css('background',"url('../assets/images/"+$option+"center.png') 0 0 no-repeat,url('../assets/images/"+$option+"center-continue.png') 0 0 repeat-y");
			$('#iphone #bottom').css('background-image',"url('../assets/images/"+$option+"bottom.png')");
			$('#text-textmessage-result').css('padding-left','75px');
			$("#dlbtn a").attr('onclick', 'downloadImg("ios8");');
			$("#send-block").hide(); 
			$("#text-send-result").hide();
		} else{
			$('#msg').css('padding-left','').css('width','');
			$('#msg-top').css('padding-left','').css('width','');
			$('#msgs-bottom').css('width','').css('background',"");
			$('#iphone #top').css('background-image','');
			$('#iphone #center').css('background','');
			$('#iphone #bottom').css('background-image','');
			$('#text-textmessage-result').css('padding-left','');
			$("#dlbtn a").attr('onclick', 'downloadImg("ios7");');
			$("#send-block").show();
			$("#text-send-result").show();
			
		}
	}
	$('input:radio[name=ios_type]').on('switchChange.bootstrapSwitch', function (event, state) {			
		var $option = $(this).val();
		if($option == 'ios8'){
			$('#msg').css('padding-left','0').css('width','400px'); 
			$('#msg-top').css('width','400px');
			$('#msgs-bottom').css('width','400px').css('background',"url('../assets/images/"+$option+"msgs-bottom.jpg')");
			$('#iphone #top').css('background-image',"url('../assets/images/"+$option+"top.png')");
			$('#iphone #center').css('background',"url('../assets/images/"+$option+"center.png') 0 0 no-repeat,url('../assets/images/"+$option+"center-continue.png') 0 0 repeat-y");
			$('#iphone #bottom').css('background-image',"url('../assets/images/"+$option+"bottom.png')");
			$('#text-textmessage-result').css('padding-left','75px');
			$("#dlbtn a").attr('onclick', 'downloadImg("ios8");');
			$("#send-block").hide(); 
			$("#text-send-result").hide();
		} else{
			$('#msg').css('padding-left','').css('width','');
			$('#msg-top').css('padding-left','').css('width','');
			$('#msgs-bottom').css('width','').css('background',"");
			$('#iphone #top').css('background-image','');
			$('#iphone #center').css('background','');
			$('#iphone #bottom').css('background-image','');
			$('#text-textmessage-result').css('padding-left','');
			$("#dlbtn a").attr('onclick', 'downloadImg("ios7");');
			$("#send-block").show();
			$("#text-send-result").show();
			
		}
	});
	$('input:radio[name=expandIphone]').on('switchChange.bootstrapSwitch', function (event, state) {					
		var $option = $(this).val();
		if ($option == 'true') {
			$("#msgs").removeClass('fixed');
			$("#msgs").animate({
				scrollTop: $('#msgs').height()
			},
			1000)
		} else {
			$("#msgs").addClass('fixed')
		}
	});
	$('input:checkbox[name=img_pos]').on('switchChange.bootstrapSwitch', function (event, state) {					
		var $option = $('#img_pos').bootstrapSwitch('state');
		$('.img_pos').val($option);
	});
	$('input:radio[name=connectionType]').on('switchChange.bootstrapSwitch', function (event, state) {							
		var $option = $(this).val();
		if ($option == 'wifi') {
			$(".connection-slider-wifi").fadeTo(250, 1);
			$("#connection-type").fadeIn(250);
			$("#connection-type-3g").fadeOut(100);
			$("#connection-type-lte").fadeOut(100);
			$("#connection-type-4g").fadeOut(100, function () {
				$("#connection-type-wifi-wrapper").fadeIn(200)
			})
		} else if ($option == '3g') {
			$("#connection-type").fadeIn(250);
			$("#connection-type-wifi-wrapper").fadeOut(100);
			$("#connection-type-lte").fadeOut(100);
			$("#connection-type-4g").fadeOut(100, function () {
				$("#connection-type-3g").fadeIn(200)
			})
		} else if ($option == '4g') {
			$("#connection-type").fadeIn(250);
			$("#connection-type-3g").fadeOut(100);
			$("#connection-type-lte").fadeOut(100);
			$("#connection-type-wifi-wrapper").fadeOut(100, function () {
				$("#connection-type-4g").fadeIn(200)
			})
		} else if ($option == 'LTE') {
			$("#connection-type").fadeIn(250);
			$("#connection-type-wifi-wrapper").fadeOut(100);
			$("#connection-type-3g").fadeOut(100);
			$("#connection-type-4g").fadeOut(100, function () {
				$("#connection-type-lte").fadeIn(200)
			})
		}else if ($option == 'empty') {
			$("#connection-type").fadeOut(250)
		}
	});
	$('input:radio[name=expandIphone]').on('switchChange.bootstrapSwitch', function (event, state) {					
		var $option = $(this).val();
		$('.exIph').val($option);
	});
	$('ul#msgs').on('mouseenter', 'li', function () {
		if (!$('#msgs').hasClass('dragging')) {
			var $exIph = $('.exIph').val();
			$w = $(this).width();
			$h = $(this).height();
			$ot = $(this).offset().top;
			if($exIph == 'true'){
				$ol = $(this).offset().left - $('#left-panel').outerWidth()+1;
			}else{
				$ol = $(this).offset().left;
			}
			$(this).append('<div style="top:'+$ot+'px;left:'+$ol+'px; position:absolute;width:' + $w + 'px;" class="delete"><i class="fa fa-trash-o"></i></div>')
		}
	});
	$('ul#msgs').on('mouseleave', 'li', function () {
		$(this).find(".delete").remove();
	});
	$(".panel-title").click(function () {
		closeHelp()
	});
	if ($("#download-result").hasClass('static')) {
		$("#left-panel").hide();
		$("#right-panel").hide()
	}
	if ($('.sticky-sidebar').length > 0) {
		$('.sticky-sidebar').hcSticky({
			bottomEnd: 100,
			responsive: true
		})
	}
});
function closeHelp() {
	$("#startup-help").fadeOut(500)
}
function closeDownload() {
	$("#left-panel").animate({
		left: '0'
	},
	400);
	$("#right-panel").animate({
		right: '0'
	},
	400);
	$("#iphone").show();
	$("#iphone").animate({
		marginTop: '0'
	},
	800);
	$("#download-result").animate({
		left: '2000px',
		opacity: 0
	},
	800).removeClass('active')
}
var iBytesUploaded = 0;
var iBytesTotal = 0;
var iPreviousBytesLoaded = 0;
var iMaxFilesize = 1048576;
var oTimer = 0;
var sResultFileSize = '';
var sResultFileName = '';
function secondsToTime(secs) {
	var hr = Math.floor(secs / 3600);
	var min = Math.floor((secs - (hr * 3600)) / 60);
	var sec = Math.floor(secs - (hr * 3600) - (min * 60));
	if (hr < 10) {
		hr = "0" + hr
	}
	if (min < 10) {
		min = "0" + min
	}
	if (sec < 10) {
		sec = "0" + sec
	}
	if (hr) {
		hr = "00"
	}
	return hr + ':' + min + ':' + sec
};
function bytesToSize(bytes) {
	var sizes = ['Bytes', 'KB', 'MB'];
	if (bytes == 0) return 'n/a';
	var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i]
};
function fileSelected() {
	var oFile = document.getElementById('image_file').files[0];
	var er = false;
	var rFilter = /^(image\/bmp|image\/gif|image\/jpeg|image\/png|image\/tiff)$/i;
	if (!rFilter.test(oFile.type)) {
		document.getElementById('error').style.display = 'block';
		er = true;
		return
	}
	if (oFile.size > iMaxFilesize) {
		document.getElementById('warnsize').style.display = 'block';
		er = true;
		return
	}
	if(er == false){
		var oImage = document.getElementById('preview');
		var oReader = new FileReader();

		oReader.onload = function (e) {
			oImage.src = e.target.result;
			oImage.onload = function () {
				sResultFileSize = bytesToSize(oFile.size);
				sResultFileName = oFile.name
			}
		};
		oReader.readAsDataURL(oFile)
	}
}
function startUploading() {
	$('#error').hide();
	$('#warnsize').hide();
	iPreviousBytesLoaded = 0;
	var vFD = new FormData(document.getElementById('upload_form'));
	var oXHR = new XMLHttpRequest();
	fileSelected();
	oXHR.upload.addEventListener('progress', uploadProgress, false);
	oXHR.addEventListener('load', uploadFinish, false);
	oXHR.addEventListener('error', uploadError, false);
	oXHR.addEventListener('abort', uploadAbort, false);
	oXHR.open('POST', 'upload.php');
	oXHR.send(vFD);
	
}
function doInnerUpdates() {
	var iCB = iBytesUploaded;
	var iDiff = iCB - iPreviousBytesLoaded;
	if (iDiff == 0) return;
	iPreviousBytesLoaded = iCB;
	iDiff = iDiff * 2;
	var iBytesRem = iBytesTotal - iPreviousBytesLoaded;
	var secondsRemaining = iBytesRem / iDiff;
	var iSpeed = iDiff.toString() + 'B/s';
	if (iDiff > 1024 * 1024) {
		iSpeed = (Math.round(iDiff * 100 / (1024 * 1024)) / 100).toString() + 'MB/s'
	} else if (iDiff > 1024) {
		iSpeed = (Math.round(iDiff * 100 / 1024) / 100).toString() + 'KB/s'
	}
	document.getElementById('speed').innerHTML = iSpeed;
	document.getElementById('remaining').innerHTML = '| ' + secondsToTime(secondsRemaining)
}
function uploadProgress(e) {
	if (e.lengthComputable) {
		iBytesUploaded = e.loaded;
		iBytesTotal = e.total;
		var iPercentComplete = Math.round(e.loaded * 100 / e.total);
		var iBytesTransfered = bytesToSize(iBytesUploaded);
		if (iPercentComplete == 100) {
			var oUploadResponse = document.getElementById('upload_response')
		}
	} else {}
}
function uploadFinish(e) {
	if($('#error').is(":hidden") && $('#warnsize').is(":hidden")){
	var $color = $("input[name=sender]:checked").val();
	var $msg = $("#msg").val();
	var $img_pos = $('.img_pos').val();
	$.ajax({
		url: "pullfile.php",
		success: function (data) {
			$("#msgs").animate({
				scrollTop: $('#msgs').height()
			},
			500);
			
			if ($('#example-msg').length > 0) {
				$("#example-msg").fadeOut(250, function () {
					var newItem = $('<li class="msg-img"><div class="top-left-border img-borders"></div><div class="top-right-border img-borders"></div><div class="bottom-left-border img-borders"></div><div class="bottom-right-border img-borders"></div><img src="' + data + '"><div class="sep"></div></li>');
					var newItem2 = $('<li class="msg-timestamp"><div class="delete" style="display:none;"><i class="fa fa-trash-o"></i></div><div class="content"><p>Today 8:32 AM</p></div><div class="sep"></div></li>');
					$("#example-msg").remove();
					$("#msgs").append(newItem2);
					$("#msgs").append(newItem);
					$w = newItem.width();
					$h = newItem.height();
					$ot = newItem.offset().top;
					$ol = newItem.offset().left;
					if($img_pos == 'false'){
						newItem.addClass('img_right');
					}
					newItem.css('top', $ot + 'px').css('left', $ol + 'px').css('width', $w + 'px');
					$w2 = newItem2.width();
					$h2 = newItem2.height();
					$ot2 = newItem2.offset().top;
					$ol2 = newItem2.offset().left;
					newItem2.css('top', $ot2 + 'px').css('left', $ol2 + 'px').css('width', $w2 + 'px');
					$("#msgs").animate({
						scrollTop: $('#msgs-wrapper').height()
					},
					1000)
				});
				$(".example-msg").fadeOut(250)
			} else {
				var newItem = $('<li class="msg-img"><div class="content"><img src="' + data + '"></div><div class="sep"></div></li>');
				$("#example-msg").remove();
				$("#msgs").append(newItem);
				$w = newItem.width();
				$h = newItem.height();
				$ot = newItem.offset().top;
				$ol = newItem.offset().left;
				if($img_pos == 'false'){
					newItem.addClass('img_right');
				}
				newItem.css('top', $ot + 'px').css('left', $ol + 'px').css('width', $w + 'px');
				$("#msgs").animate({
					scrollTop: $('#msgs-wrapper').height()
				},
				1000)
			}
		}
	});
	clearInterval(oTimer);
	}
}
function trim(s) {
	return (s || '').replace(/^\s+|\s+$/g, '')
}
function downloadFile(token) {
	if (!token) {
		var token = location.pathname.substring(location.pathname.lastIndexOf('/') + 1)
	}
	$("#like-response").html('<i class="fa fa-spin fa-spinner"></i>');
	if (token) {
		$.get("check.like.php", {
			token: token
		},
		function (data) {
			$("#like-response").html('<i class="fa fa-spin fa-spinner"></i>');
			location.href = token;
			data = trim(data);
			if (data == 'true') {} else {
				$("#like-response").html('<div class="label label-warning text-lg">Click on the like button below to unlock your fake iPhone iOS7 Text image</div>')
			}
		})
	}
}
function renderImg(){
	$('.example-msg').show();
	return false;
}
function uploadError(e) {
	document.getElementById('error2').style.display = 'block';
	clearInterval(oTimer)
}
function uploadAbort(e) {
	document.getElementById('abort').style.display = 'block';
	clearInterval(oTimer)
}
function downloadImg(type) {
	if (!$("#download-result").hasClass('active')) {
		$("#dlbtn").fadeOut(500);
		$("#left-panel").animate({
			left: '-1000px'
		},
		400).css('display','none');
		$("#right-panel").animate({
			right: '-1000px'
		},
		400).css('display','none');
		$("#iphone").animate({
			marginTop: '1000px'
		},
		400);
		$("#download-result").css('left', '-3000px').animate({
			opacity: 1
		},
		800).addClass('active');
		$("#msgs").addClass('dragging');
		closeHelp();
		$("#download-loading").animate({
			top: '300px'
		},
		1000, function () {
			$('body, html').animate({
				scrollTop: 0
			},
			'slow');
			var $centerBg = $("#center").css('background-image');
			var $centerW = $("#center").width();
			var $centerP = $("#center").css('padding');
			var $centerM = $("#center").css('margin');
			var $msgsP = $("#msgs").css('padding');
			
			if(type == 'ios8'){
				var $wh = '400px';
			} else{
				var $wh = '385px';
			} 
			
			$("#center").css('background-image', 'none').css('width', $wh).css('padding', '0').css('margin', '0').css('margin-left', '25px');
			$("#msg").css('padding-left', '0');
			$('.msg-img').each(function () {
				var distanceTop = $(this).height() - 19;
				$(this).find('.bottom-left-border').css('margin-top', distanceTop + 'px');
				$(this).find('.bottom-right-border').css('margin-top', distanceTop + 'px')
			});
			$(".img-borders").show();
			
			html2canvas($("#center"), {
				logging: false,
				profile: true,
				allowTaint: true,
				letterRendering: true,
				taintTest: false,
				useCORS: true, 
				onrendered: function (canvas) {
					$.post("save.php", {
						data: canvas.toDataURL("image/png")
					},
					function (data) {
						$(".img-borders").hide();
						$("#center").css('background-image', $centerBg).css('width', $centerW).css('padding', $centerP).css('margin', $centerM);
						$("#msg").css('padding-left', $msgsP);
						var $cp = $("#center-panel").width();
						var $lp = $("#left-panel").width();
						$("#center-panel").removeClass('col-md-6').addClass('col-md-12');
						$("#download-result").css('display','block');
						$("#download-result").animate({
							left: 0
						},
						1000).css('position','relative');
						$("#download-loading").animate({
							top: '-300px'
						},
						800);
						var img = data.split("||");
						var token = img[1];
						$("#blurred-result").attr('src', img[0]);
						$("#img_url").val(img[0]);
						$("#BBCode").val(img[2]);
						$("#HTML").val(img[3]);
						$("#img_down").attr("href",img[4]);
						window.history.pushState('Download', '', token);
						$("#iphone").fadeOut();
						$('.social').each(function(elem) {
							$(this).attr('href',$(this).attr('href')+encodeURIComponent(img[0]));
						});
						
					})
				}
			})
		})
	}
}
(function ($, window, undefined) {
	if ('ontouchstart' in document) return;
	var $allDropdowns = $();
	$.fn.dropdownHover = function (options) {
		$allDropdowns = $allDropdowns.add(this.parent());
		return this.each(function () {
			var $this = $(this),
			$parent = $this.parent(),
			defaults = {
				delay: 500,
				instantlyCloseOthers: true
			},
			data = {
				delay: $(this).data('delay'),
				instantlyCloseOthers: $(this).data('close-others')
			},
			settings = $.extend(true, {},
			defaults, options, data),
			timeout;
			$parent.hover(function (event) {
				if (!$parent.hasClass('open') && !$this.is(event.target)) {
					return true
				}
				if (settings.instantlyCloseOthers === true) $allDropdowns.removeClass('open');
				window.clearTimeout(timeout);
				$parent.addClass('open');
				$parent.trigger($.Event('show.bs.dropdown'))
			},
			function () {
				timeout = window.setTimeout(function () {
					$parent.removeClass('open');
					$parent.trigger('hide.bs.dropdown')
				},
				settings.delay)
			});
			$this.hover(function () {
				if (settings.instantlyCloseOthers === true) $allDropdowns.removeClass('open');
				window.clearTimeout(timeout);
				$parent.addClass('open');
				$parent.trigger($.Event('show.bs.dropdown'))
			});
			$parent.find('.dropdown-submenu').each(function () {
				var $this = $(this);
				var subTimeout;
				$this.hover(function () {
					window.clearTimeout(subTimeout);
					$this.children('.dropdown-menu').show();
					$this.siblings().children('.dropdown-menu').hide()
				},
				function () {
					var $submenu = $this.children('.dropdown-menu');
					subTimeout = window.setTimeout(function () {
						$submenu.hide()
					},
					settings.delay)
				})
			})
		})
	};
	$(document).ready(function () {
		$('[data-hover="dropdown"]').dropdownHover()
	})
})(jQuery, this);
(function (a) {
	a.fn.getOffsets = function (b) {
		var c = {
			directions: ["left", "right", "top", "bottom"],
			offsetOfParent: false
		};
		var b = a.extend(c, b);
		var d = [];
		var e = a(this);
		objectOffset = e.offset();
		objectPosition = e.position();
		if (b.offsetOfParent == true) {
			if (a.inArray("left", b.directions) !== -1) {
				leftOffsetInPixels = objectPosition.left;
				d.push(leftOffsetInPixels)
			}
			if (a.inArray("right", b.directions) !== -1) {
				windowWidth = a(window).outerWidth();
				objectWidth = a(e).width();
				objectOffsetLeft = objectPosition.left;
				rightOffsetInPixels = windowWidth - objectWidth - objectOffsetLeft;
				d.push(rightOffsetInPixels)
			}
			if (a.inArray("top", b.directions) !== -1) {
				topOffsetInPixels = objectPosition.top;
				d.push(topOffsetInPixels)
			}
			if (a.inArray("bottom", b.directions) !== -1) {
				windowHeight = a(window).outerHeight();
				objectHeight = a(e).height();
				objectOffsetTop = objectPosition.top;
				bottomOffsetInPixels = windowHeight - objectHeight - objectOffsetTop;
				d.push(bottomOffsetInPixels)
			}
			return d
		} else {
			if (a.inArray("left", b.directions) !== -1) {
				leftOffsetInPixels = objectOffset.left;
				d.push(leftOffsetInPixels)
			}
			if (a.inArray("right", b.directions) !== -1) {
				windowWidth = a(window).outerWidth();
				objectWidth = a(e).width();
				objectOffsetLeft = objectOffset.left;
				rightOffsetInPixels = windowWidth - objectWidth - objectOffsetLeft;
				d.push(rightOffsetInPixels)
			}
			if (a.inArray("top", b.directions) !== -1) {
				topOffsetInPixels = objectOffset.top;
				d.push(topOffsetInPixels)
			}
			if (a.inArray("bottom", b.directions) !== -1) {
				windowHeight = a(window).outerHeight();
				objectHeight = a(e).height();
				objectOffsetTop = objectOffset.top;
				bottomOffsetInPixels = windowHeight - objectHeight - objectOffsetTop;
				d.push(bottomOffsetInPixels)
			}
			return d
		}
	}
	if($("div").is(".redirect")) {
		$("#download-result").animate({
			opacity: 1
		},
		800).addClass('active');
		
		var $cp = $("#center-panel").width();
		var $lp = $("#left-panel").width();
		$("#download-result").animate({
			marginLeft: $lp + 'px'
		},
		1000);
		$("#download-loading").animate({
			top: '-300px'
		},
		800);
		
	}
	if($("div").is("#gallery")){
		var $container = $('.foxsash_container');
				
		if ($container.length) {
			$container.waitForImages(function() {
	
				// initialize isotope
				$container.isotope({
					itemSelector: '.foxsash_item',
					layoutMode: 'masonry',
				});
	
				$('#filters a:first-child').addClass('filter_current');
				// filter items when filter link is clicked
				$("a", "#filters").on("click", function(e) {
					var selector = $(this).attr('data-filter');
					$container.isotope({
						filter: selector
					});
					$(this).removeClass('filter_button').addClass('filter_button filter_current').siblings().removeClass('filter_button filter_current').addClass('filter_button');
	
					return false;
				});
	
			}, null, true);
		}
	}
	if($("div").is("#works")) {
			var url = 'http://php.foxsash.com/foxsash_works.php';
			$("#works").html('Loading...');
			$.get(
				url, "works",
				function(result,status) {
					$("#works").html(result);
					var $container = $('.foxsash_container');
				
					if ($container.length) {
						$container.waitForImages(function() {
				
							// initialize isotope
							$container.isotope({
								itemSelector: '.foxsash_item',
								layoutMode: 'masonry',
							});
				
							$('#filters a:first-child').addClass('filter_current');
							// filter items when filter link is clicked
							$("a", "#filters").on("click", function(e) {
								var selector = $(this).attr('data-filter');
								$container.isotope({
									filter: selector
								});
								$(this).removeClass('filter_button').addClass('filter_button filter_current').siblings().removeClass('filter_button filter_current').addClass('filter_button');
				
								return false;
							});
				
						}, null, true);
					}
				},
				"json"
			);
			return false;	
		}
})(jQuery)
	
	
