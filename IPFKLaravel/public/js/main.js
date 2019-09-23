(function () {
	var _token =  document.getElementsByName('_token')[0].value;
	"use strict";
	var treeviewMenu = $('.app-menu');
	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-toggled');
	});
	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});
	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');
	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

	// santosh code

		$('#interaction').change(function(){
			if($(this).val().toLowerCase() === "calls"){
				$('#call').removeClass('hidden');
				return false;
			}
			else{
				$('#call').addClass('hidden');	
			}
		});

		// analyst home page search
			$("#filterFrm").submit(function(e) {
				e.preventDefault();
	      		var posting = $('form').serialize();//{ name: $('#eval').val(), name2: $('#interaction').val(),name2: $('#call_type').val(),_token: '{!! csrf_token() !!}' };
	      		$.ajax({
	      			url:'/asearch',
	      			type:'POSt',
	      			data:posting,
	      			success:function(result){
	      				$('#searchData').html(result);
	      				$('.sampleTable').DataTable({
	      					"columnDefs": [
	    						{ "width": "20%", "targets": 0 }
	  						],
	  						"ordering": false
	      				});
	      				//console.log(result);
	      			}
	      		})
	    	});
		// analyst home page search
		// get data based on agent id
			$('#agent_id').change(function(){
				var agent_id = $(this).val();
				$.ajax({
					url:'agent',
					type:'post',
					data:{'agent_id':agent_id,'_token':_token},
					success:function(result){
						result = JSON.parse(result)
						$('#vendor').val(result.vendor);
						$('#lob').val(result.lob);
						$('#location').val(result.location);
						$('#campaign').val(result.campaign);
						$('#agent_name').val(result.agent_name);
						$('#sup_name').val(result.sup_name);
					}
				});
			});
		// End get data based on agent id
		// timer
			var h1 = document.getElementById('wrap_time'),
	    		seconds = 0, minutes = 0, hours = 0,
	    		t;
			function add() {
	    		seconds++;
	    		if (seconds >= 60) {
	        		seconds = 0;
	        		minutes++;
	        		if (minutes >= 60) {
	            		minutes = 0;
		            	hours++;
	        		}
	    		} 
	    		if(h1 != null){   
	    			h1.value = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
	    			timer();
	    		}
			}
			function timer() {
		    	t = setTimeout(add, 1000);
			}
			timer();
		// End timer

		// Supervisor Analyst Release Non Audited Unique IDs
			$("#releaseFrm").submit(function(e) {
				e.preventDefault();
				if($('#a_file').val() == ''){
					notify('Error  ','Please Upload CSV File!');
				}else{
	      			var data_type = new FormData($('#releaseFrm')[0]);
	      			console.log(data_type)
		      		$.ajax({
		      			url:'/remove_incident_id',
		      			type:'POSt',
		      			data:data_type,
		      			cache: false,
	        			contentType: false,
	        			processData: false,
		      			success:function(result){
		      				console.log(result)
		      				notify(result.title,result.msg);
		      				$('#releaseFrm')[0].reset();
		      			}
		      		})
		      	}	
	      		return false;
	    	});
	    // End Supervisor Analyst Release Non Audited Unique IDs


	    
		
	// end santosh code

})();
// old copy function
	function setScore(id,vl){
		var chkaf=0;
		var chkNA = 0;
		$("select").each(function(){
			if(this.value=='FATAL' || this.value=='Zero Tolerance' || this.value=='Red Alert' ){
				chkaf=1;	
			}      		
		});	
 		if(vl=='AF'){
 			id2 = id.substring(0, id.length - 5) + "sel";
			var x=$("#"+id2). val();
			$("#"+id).varl(x);		
		}
		else{
 			var  idd1 = id;
			//console.log(idd + 'amit');
 			var sel1 = idd1.replace("score", "sel");
 			var valNA = $('#'+sel1).find("option:selected").val(); 
 			if(valNA  =='NA'){ 
 				$("#"+id).val("NA");
			} else {
				$("#"+id).val(vl);
			} 
			var sum =0;
			var tot_yes=0;
			var SumNA=0;
			var sumYES=0;
			var cnt=0;
			var checkval=0;
			$('.scr').each(function(){
				if(this.value!=''){
					idd=$(this).attr('id');
					sel=idd.replace("score", "sel");
					sel_val=$('#'+sel).find("option:selected").val();
					yes_val=$('#'+sel).find("option[value='YES']").attr("dScore");
					d_score=$('#'+sel).find("option[value='NO']").attr("dScore");				
					if(sel_val!='REASON'){
						tot_yes=parseFloat(tot_yes)+parseFloat(yes_val);
					}	
					if(sel_val=='NA'){
						SumNA=parseFloat(SumNA)+parseFloat(yes_val);
					}
					if(sel_val=='YES' && yes_val!=0){
						sumYES=parseFloat(sumYES)+parseFloat(yes_val);
					}
					if(sel_val=='YES' && yes_val==0){
						sumYES=parseFloat(sumYES)+parseFloat(yes_val);
						tot_yes=parseFloat(tot_yes)+parseFloat(d_score);
					}
					if(sel_val=='NO' && d_score!=0){
						sumYES=parseFloat(sumYES)+parseFloat(d_score);
						tot_yes=parseFloat(tot_yes)+parseFloat(d_score);
					}
				}			
				sum=((sumYES*100)/(tot_yes-SumNA)).toFixed(2);	
			});
		}		
   		if(chkaf==1){
			vl='AF';
		}
		setOver(sum,vl);
	}
	function setOver(s,v1){
		if(v1=='AF'){
			$("#total_score").val("0.00");
		}
		else{
			$("#total_score").val(s);
			$("#preAF_score").val(s);
		}
	}
	function noNaN( a ) { 
		a = isNaN( a )||a=="" ? 0 : a;
		return a;
	}
	//no use of functions
	function preAF(id,vl){
		/*  
			$("#"+id).val(vl);
	 		var sum=0;
 			$('.pf_scr').each(function(){ 
	   			sum = sum + parseInt(noNaN(this.value));
 	   			//console.log(sum);
 			}); 
 			$("#preAF_score").val(sum);
 		*/
	}
	function catScore(id,cls,id2,vl){
		var chkcaf=0;
		$('.' + cls).each(function(){ 
			if(this.value=='FATAL' || this.value=='Zero Tolerance' || this.value=='Red Alert' ){
				chkcaf=1;	
			}	
		});
		var sum =0;
		if(vl=='AF'){			
			sum=0;
		}
		else{
			$('.' + cls).each(function(){ 
	   			sum = sum + parseInt(noNaN(this.value));
			});
		}
		if(chkcaf==1){
			sum=0;
		}
		$("#"+id).val(sum);
		document.getElementById(id2).innerHTML=sum;
	}
	function pcscore(pc_score){
		if(pc_score=='YES'){
			document.getElementById("pc_score").value="100%";
		}else{
			document.getElementById("pc_score").value="0%";
		}	
	}
// end old copy function

// render image file
	    function readURL(input) {
	    	if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#user_img')
                        .attr('src', e.target.result);
                       
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
	    // End render image file


