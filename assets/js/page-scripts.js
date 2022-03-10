String.prototype.trimLeft = function(charlist) {
  if (charlist === undefined)
	charlist = "\s";
  return this.replace(new RegExp("^[" + charlist + "]+"), "");
};

String.prototype.trimRight = function(charlist) {
  if (charlist === undefined)
	charlist = "\s";
  return this.replace(new RegExp("[" + charlist + "]+$"), "");
};

function valToArray(val) {
	if(val){
		if(Array.isArray(val)){
			return val;
		}
		else{
			return val.split(",");
		}
	}
	else{
		return [];
	}
};

function debounce(fn, delay) {
  var timer = null;
  return function () {
	var context = this, args = arguments;
	clearTimeout(timer);
	timer = setTimeout(function () {
	  fn.apply(context, args);
	}, delay);
  };
}

function extend(obj, src) {
	for (var key in src) {
		if (src.hasOwnProperty(key)) obj[key] = src[key];
	}
	return obj;
}

function setPathLink(path , queryObj){
	var url;
	if(queryObj){
		var str = [];
		for(var k in queryObj){
			var v = queryObj[k]
			if (queryObj.hasOwnProperty(k) && v !== '') {
				str.push(encodeURIComponent(k) + "=" + encodeURIComponent(v));
			} 
		}
		var qs = str.join("&");
		if(path.indexOf('?') > 0){
			url = path + '&' + qs;  
		}
		else{
			url = path + '?' + qs;  
		}
	}
	else{
		url = siteAddr + path;
	}
	return url;
}

function randomColor() {
	var letters = '0123456789ABCDEF';
	var color = '#';
	for (var i = 0; i < 6; i++) {
		color += letters[Math.floor(Math.random() * 16)];
	}
	return color;
}

function hideFlashMsg(){
	var elem=$('#flashmsgholder');
	if(elem.length>0){
		var duration=elem.attr("data-show-duration");
		if(duration>0){
			window.setTimeout(function(){
				elem.fadeOut();
			},duration)
		}
	}
}

var pageLoadinStyle = $('#page-loading-indicator').html(); //loding indicator used for ajax load content

$(document).ready(function() {
	hideFlashMsg();//hides page flash msg after page navigate.
	
});

$(document).on('click', '.toggle-check-all', function(){
	var p = $(this).closest('table').find('.optioncheck');
	p.prop("checked",$(this).prop("checked"));
});

$(document).on('click', '.optioncheck, .toggle-check-all', function(){
	var sel_ids =$(this).closest('.page').find("input.optioncheck:checkbox:checked").map(function(){
	  return $(this).val();
	}).get();
	if(sel_ids.length>0){
		 $(this).closest('.page').find('.btn-delete-selected').removeClass('d-none');
	}
	else{
		$(this).closest('.page').find('.btn-delete-selected').addClass('d-none');
	}
});

$(document).on('click', '.btn-delete-selected', function(){
	var recordDeleteMsg = $(this).data("prompt-msg");

	if(!recordDeleteMsg){
		recordDeleteMsg = "Are you sure you want to delete selected records?";
	}

	var sel_ids =$(this).closest('.page').find("input.optioncheck:checkbox:checked").map(function(){
	  return $(this).val();
	}).get();

	if(sel_ids.length>0){
		if(confirm(recordDeleteMsg)){
			var url = $(this).data('url');
			url = url.replace("{sel_ids}",sel_ids);
			window.location = url;
		}
	}
	else{
		alert('No Record Selected');
	}
});

$(document).on('click', '.recordDeletePromptAction', function(e){
	var recordDeleteMsg = $(this).data("prompt-msg");
	if(!recordDeleteMsg){
		recordDeleteMsg="Are you sure you want to delete this record?";
	}
	if(!confirm(recordDeleteMsg)){
		e.preventDefault();
	}
});

$(document).on('click', '.removeEditUploadFile', function(e){
	 // hidden input that contains all the file
	var holder = $(this).closest(".uploaded-file-holder");
	var inputid = $(this).attr("data-input");
	var inputControl = $(inputid);
	var filepath = $(this).attr('data-file');
	var filenum = $(this).attr('data-file-num');
	var srcTxt = inputControl.val();
	if(srcTxt){
		var arrSrc = srcTxt.split(",");
		arrSrc.forEach(function(src,index){
			if(src == filepath){
				arrSrc.splice(index,1);
			}
		});
	}
	holder.find("#file-holder-"+filenum).remove();
	var ty = arrSrc.join(",");
	inputControl.val(ty);
});

$(document).on('click', '.open-page-modal', function(e){
	e.preventDefault();
	var dataURL = $(this).attr('href');
	var modal = $(this).next('.modal');
	modal.modal({show:true});
	modal.find('.modal-body').html(pageLoadinStyle).load(dataURL);
});

$(document).on('click', 'a.page-modal', function(e){
	e.preventDefault();
	var dataURL = $(this).attr('href');
	var modal = $('#main-page-modal');
	modal.modal({show:true});
	modal.find('.modal-body').html(pageLoadinStyle).load(dataURL);
});

$(document).on('click', '.open-page-inline', function(e){
	e.preventDefault();
	var dataURL = $(this).attr('href');
	var page = $(this).parent('.inline-page').find('.page-content');
	var loaded = page.attr('loaded');
	if(!loaded){
		page.html(pageLoadinStyle).load(dataURL);
		page.attr('loaded',true)
	}
	page.toggleClass("d-none");
});

$(document).on('change', '.custom-file-input', function(){
	var fileName = $(this).val().split('\\').pop();
	$(this).siblings('.custom-file-label').addClass('selected').html(fileName);
});

$(document).on('click', '.export-btn', function(e){
	var html = $(this).closest('.page').find('.page-records').html();
	var title = $(this).closest('.page').find('.record-title').html();
	$('#exportformdata').val(html);
	$('#exportformtitle').val(title);
	$('#exportform').submit();
});

$(document).on('submit', 'form.multi-form', function(e){
	var isAllRowsValid = true;
	var form = $(this)[0];
	$(form).find('tr.input-row').each(function(e){
		var validateRow = false;
		$(this).find('td').each(function(e){
			var inp = $(this).find('input.form-control,select,textarea');
			if(inp.val()){
				validateRow = true;
				return true;
			}
		});
		
		if(validateRow == true){
			$(this).find('input,select,textarea').each(function(e){
				var elem = $(this)[0];
				if(!elem.checkValidity()){
					isAllRowsValid = false;
					return true;
				}
			});
			if(isAllRowsValid == false){
				$(this).addClass('was-validated')
			}
			else{
				$(this).removeClass('was-validated')
			}
		}
	});
	
	if(isAllRowsValid == false){
		e.preventDefault();
		//form.reportValidity();
		e.preventDefault();
	}
});

$(document).on('blur', '.ctrl-check-duplicate', function(){
	var inputElem = $(this)
	var val = inputElem.val();
	var apiUrl = inputElem.data("url");
	var elemCheckStatus = inputElem.closest('.form-group').find('.check-status');
	
	var loadingMsg = inputElem.data('loading-msg');
	var availableMsg = inputElem.data('available-msg');
	var notAvailableMsg = inputElem.data('unavailable-msg');
	
	elemCheckStatus.html('<small class="text-muted">' + loadingMsg + '</small>');
	if(val){
		$.ajax({
			url : setPathLink(apiUrl + val),
			success : function(result) {
				if(result == true) {
					inputElem.addClass('is-invalid');
					elemCheckStatus.html('<small class="text-danger">' + notAvailableMsg + '</small>');
				}
				else{ 
					inputElem.removeClass('is-invalid').addClass('is-valid');
					elemCheckStatus.html('<small class="text-success">' + availableMsg + '</small>');
				}
			},
			error : function(err) {
				elemCheckStatus.html('');
				console.log(err);
			}
		});
	}
	else{
		elemCheckStatus.html('');
		inputElem.removeClass('is-valid').removeClass('is-valid');
	}
});

$(document).on('change', '[data-load-target]', function(e){
	var val = $(this).val();
	var path = $(this).data('load-path');
	path = path + '/' + val;
	var targetName =  $(this).data('load-target');
	var selectElem ="[name='" +  targetName +  "']";
	$(selectElem).html('<option value="">Loading...</option>');
	var placeholder = $(selectElem).attr('placeholder') || 'Select a value...';
	$.ajax({
		type: 'GET',
		url: path,
		dataType: 'json',
		success: function (data){
			var options = '<option value="">' + placeholder +  '</option>';
			for (var i = 0; i < data.length; i++) {
				options += '<option value="' + data[i].value + '">' + data[i].label + '</option>';
			}
			$(selectElem).html(options);
		},
		error: function (data) {
			
		},
	});
});

$(window).bind('load', function(){
	$('img').each(function() {
		if((typeof this.naturalWidth != "undefined" && this.naturalWidth == 0 ) || this.readyState == 'uninitialized' ) {
			$(this).attr('src', './assets/images/no-image-available.png');
		}
	}); 
	}
);$(function(){
	var winHeight = $(window).height();
	var navTopHeight = $('#topbar').outerHeight();
	document.body.style.paddingTop = navTopHeight + 'px';
});
