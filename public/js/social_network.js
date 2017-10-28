$(document).on('click', '.cancel-partnership', function(e){
            e.preventDefault();
            var ref = $(this).data("reference");

            $.ajax({
                url:'/merchant/trade/partner/end/' + ref,
                type:'GET',
                data: {reference: ref},
                success:function(data){
                    var btn = $('#trade-req' + data.user);
                    btn.text('send trade request');
                    btn.removeClass('btn-brand');
                    btn.addClass('send-trade-request btn-outline-brand');
                    btn.removeAttr('data-toggle')
                    btn.removeAttr('data-target')
                    btn.data('reference', data.user)
                    $('#cancel-modal' + data.user).modal('toggle');
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while cancelling partnership!");
                }
            });
    });

$(document).on('click', '.cancel-trade-request', function(e){
            e.preventDefault();
            var ref = $(this).data("reference");

            $.ajax({
                url:'/merchant/trade/request/cancel/' + ref,
                type:'GET',
                data: {reference: ref},
                success:function(data){
                    var btn = $('#trade-req' + data.user);
                    btn.text('send trade request');
                    btn.removeClass('btn-brand');
                    btn.addClass('send-trade-request btn-outline-brand');
                    btn.removeAttr('data-toggle')
                    btn.removeAttr('data-target')
                    btn.data('reference', data.user)
                    $('#cancel-request-modal' + data.user).modal('toggle');
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while cancelling request!");
                }
            });
    });

$(document).on('click', '.send-trade-request', function(e){
            e.preventDefault();
            
            var ref = $(this).data("reference");
            var obj = $(this);
            
            $.ajax({
                url:'/merchant/trade/request/send/' + ref,
                type:'GET',
                data: {reference: ref},
                success:function(data){
                    obj.text('cancel trade request');
                    obj.removeClass('send-trade-request btn-outline-brand');
                    obj.addClass('btn-brand');
                    obj.attr('data-toggle', 'modal')
                    obj.attr('data-target', '#cancel-request-modal' + data.user)
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while sending request!");
                }
            });
    });

$(document).on('click', '.cancel-friendship', function(e){
            e.preventDefault();
            var ref = $(this).data("reference");

            $.ajax({
                url:'/friends/unfriend/' + ref,
                type:'GET',
                data: {reference: ref},
                success:function(data){
                    var btn = $('#friend-req' + data.user);
                    btn.text('send friend request');
                    btn.removeClass('btn-brand');
                    btn.addClass('send-friend-request btn-outline-brand');
                    btn.removeAttr('data-toggle')
                    btn.removeAttr('data-target')
                    btn.data('reference', data.user)
                    $('#cancel-modal' + data.user).modal('toggle');
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while cancelling request!");
                }
            });
    });

$(document).on('click', '.cancel-friend-request', function(e){
            e.preventDefault();
            var ref = $(this).data("reference");

            $.ajax({
                url:'/friends/request/cancel/' + ref,
                type:'GET',
                data: {reference: ref},
                success:function(data){
                    var btn = $('#friend-req' + data.user);
                    btn.text('send friend request');
                    btn.removeClass('btn-brand');
                    btn.addClass('send-friend-request btn-outline-brand');
                    btn.removeAttr('data-toggle')
                    btn.removeAttr('data-target')
                    btn.data('reference', data.user)
                    $('#cancel-request-modal' + data.user).modal('toggle');
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while cancelling request!");
                }
            });
    });

$(document).on('click', '.send-friend-request', function(e){
            e.preventDefault();
            
            var ref = $(this).data("reference");
            var obj = $(this);
            
            $.ajax({
                url:'/friends/request/send/' + ref,
                type:'GET',
                data: {reference: ref},
                success:function(data){
                    obj.text('cancel friend request');
                    obj.removeClass('send-friend-request btn-outline-brand');
                    obj.addClass('btn-brand');
                    obj.attr('data-toggle', 'modal')
                    obj.attr('data-target', '#cancel-request-modal' + data.user)
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while sending request!");
                }
            });
    });

$(document).on('click', '.no-js', function(e){
    e.preventDefault();
});


$(document).ready(function () {
    $('.delete_post').click(function (e) {
        e.preventDefault();
        // alert(this.href);
         $.ajax({
            url: this.href,
            type:"GET",
            data: {},
            success: function(data){
                $('#post__' + data.post_id).hide();
                $('#post-delete-modal' + data.post_id).modal('toggle');

                toastr.info("post has been deleted!");
            },
            error: function(data){
                toastr.error("Somthing went wrong!");
            }
        });
    });
});




$(document).ready(function () {
    $('#product-upload-form').submit(function (e) {
        e.preventDefault();
        // var form = $('#product-upload-form');

        var files = $('#post_image').prop('files');
        var arr = $.map(files, function(value, index) {
            return [value];
        });
        // console.log(arr);
        var title = $('#post_title').val();
        var content = $('#status_update').val();

        var data = new FormData();
        data.append('title', title);
        data.append('content', content);

        for (var i = 0; i < arr.length; i++) {
            data.append('file[' + i +']', arr[i]);
        }

         $.ajax({
            url: "/post",
            type:"POST",
            enctype: 'multipart/form-data', 
            data: data,
            processData: false,
            contentType: false,
            success: function(data){
                if($('#product-upload-form').data('status') == 1){
                    $('#all_posts').prepend(data);
                }
                $('#post_title').val(' ');
                $('#status_update').val(' ');
                $('#product-imgs').html(' ');
                $('#product-img-wrapper').removeClass('dis-flex');
                $('#product-img-wrapper').addClass('dis-none');
                toastr.success("post made!");
            },
            error: function (data) {
                toastr.error("Somthing went wrong");
            }
        });

    });
});


    $(document).ready(function(){
        var postForm = $("#postForm1"); // i change the class from postForm to PostForm1
        postForm.submit(function(e){
            e.preventDefault();
            var formData = postForm.serialize();
            // console.log(formData);
            // $( '#register-errors-name' ).html( "" );
            // $( '#register-errors-email' ).html( "" );
            // $( '#register-errors-password' ).html( "" );
            // $("#register-name").removeClass("has-error");
            // $("#register-email").removeClass("has-error");
            // $("#register-password").removeClass("has-error");

            $.ajax({
                url:'/post',
                type:'POST',
                data:formData,
                success:function(data){
                	toastr.options.preventDuplicates = true;
                	toastr.success("Post achieved successfully!");
                	
                	// location.reload(true);
                },
                error: function (data) {
                	toastr.options.preventDuplicates = true;
                	toastr.error("An error occured while posting...");
                    // console.log(data.responseText);
                    var obj = jQuery.parseJSON( data.responseText );
                }
            });
        });
    });



// var reciever_email = $(".send_").data("email");
// console.log(reciever_email);
$(document).ready(function(){
    
        $(document).on('click', '.send_request',function(e){
            e.preventDefault();
            var reciever_email = $(this).data("email");
            $(this).removeClass('send_request').text('undo request');
            $(this).addClass('undo_request');
            $.ajax({
                url:'send_request/'+reciever_email,
                type:'POST',
                data: {email:reciever_email},
                success:function(data){
                    toastr.options.preventDuplicates = true;
                    toastr.success("Request sent to " + reciever_email);
                        
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured sending request...");
                }
            });

        });
    });

//sudo rm -r or -f /var/www/html/de_bridge

    $(document).on('click', "button.undo_request", function(e){
          // alert('clickrf now kilonshele');
            e.preventDefault();
            var reciever_email = $(this).data("email");
            $(this).removeClass('undo_request').text('Send Friend Request');
            $(this).addClass('send_request');

            $.ajax({
                url:'undo_request/'+reciever_email,
                type:'POST',
                data: {email:reciever_email},
                success:function(data){
                    // alert(data);
                    // console.log(data);
                    toastr.options.preventDuplicates = true;
                    toastr.info("Request cancelled!");
                    $(this).hide();
                    $("#send_request").show()
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured cancelling request...");
                    // var obj = jQuery.parseJSON( data.responseText );
                }
            });
    });


//follow logic


$(document).on('click', ".follow", function(e){
        // console.log('clicked!');
          // alert('clickrf now kilonshele');
            e.preventDefault();
            // alert('followed');

            var reciever_email = $(this).data("email");
            var reciever_full_name = $(this).data("fname");

            // alert(reciever_email);
            $(this).removeClass('follow').text(' unfollow');
            $(this).addClass('unfollow');
            $(this).removeClass('btn-outline-brand');
            $(this).addClass('btn-brand');

            $.ajax({
                url:'/follow/'+reciever_email,
                type:'POST',
                data: {reference:reciever_email},
                success:function(data){
                    // alert(data);
                    // console.log(data);
                    var current_count = $(".follow_count").text();
                    current_count++;
                    $(".follow_count").text(current_count);
                    toastr.options.preventDuplicates = true;
                    // toastr.success("Now following "+reciever_full_name);
                    
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while following "+ reciever_full_name);
                    // var obj = jQuery.parseJSON( data.responseText );
                }
            });
    });

$(document).on('click', ".unfollow", function(e){
          // alert('clickrf now kilonshele');
            e.preventDefault();
            var reciever_email = $(this).data("email");
            var reciever_full_name = $(this).data("fname");

            // alert(reciever_email);
            $(this).removeClass('unfollow').text(' follow');
            $(this).addClass('follow');
            $(this).removeClass('btn-brand');
            $(this).addClass('btn-outline-brand');
            // $(this).addClass('f-14');


            $.ajax({
                url:'/unfollow/'+reciever_email,
                type:'POST',
                data: {reference:reciever_email},
                success:function(data){
                    // alert(data);
                    // console.log(data);
                    var current_count = $(".follow_count").text();
                    current_count--;
                    $(".follow_count").text(current_count);
                    toastr.options.preventDuplicates = true;
                    // toastr.info("You unfollowed "+reciever_full_name);
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while following "+ reciever_full_name);
                    // var obj = jQuery.parseJSON( data.responseText );
                }
            });
    });



//accept friend_request
$(document).on('click', ".accept_friend", function(e){
          // alert('clickrf now kilonshele');
            e.preventDefault();
            var reciever_email = $(this).data("email");
            var friend_request_div = $(this).data("id");

            // alert(reciever_email);
            $("#user_div"+friend_request_div).hide();
            $.ajax({
                url:'accept_friend/'+reciever_email,
                type:'POST',
                data: {email:reciever_email},
                success:function(data){
                    // alert(data);
                    // console.log(data);
                    toastr.options.preventDuplicates = true;
                    toastr.info("You are now friend with "+reciever_email);
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while accepting "+ reciever_email + " request");
                    // var obj = jQuery.parseJSON( data.responseText );
                }
            });
    });

//decline friend_request
function ConfirmDelete()
              {
              var x = confirm("Are you sure you want to decline this request ?");
              if (x)
                return true;
              else
                return false;
              }
              $("button#a_del").click(function(){
               return ConfirmDelete();
              });
              $("button#a_del").click(function(){
               return ConfirmDelete();
              });


$(document).on('click', ".decline_friend", function(e){
          // alert('clickrf now kilonshele');
            e.preventDefault();
            var reciever_email = $(this).data("email");
            var friend_request_div = $(this).data("id");

            // alert(reciever_email);
            $("#user_div"+friend_request_div).hide();

            $.ajax({
                url:'decline_friend/'+reciever_email,
                type:'POST',
                data: {email:reciever_email},
                success:function(data){
                    // alert(data);
                    // console.log(data);
                    toastr.options.preventDuplicates = true;
                    toastr.info("You declined "+reciever_email+"'s request");
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while accepting "+ reciever_email + " request");
                    // var obj = jQuery.parseJSON( data.responseText );
                }
            });
    });



//continue registeration process for following some certain user and merchant

// var followers_counter = $(".followers_counter").text();
$(document).on('click', ".c_follow", function(e){
        var follow_id = $(this).data("id");
            // alert('nacked');
            var reciever_email = $(this).data("email");
            var reciever_full_name = $(this).data("fname");

            $(this).removeClass('c_follow');
            $(this).addClass('c_unfollow');
            $(this).addClass('unfollow_btn');
            $(this).addClass('fa fa-check').css('color', 'white');
            

            $.ajax({
                url:'/follow/'+reciever_email,
                type:'POST',
                data: {reference:reciever_email},
                success:function(data){
                    console.log(data);
                    var f_counter = $(".count").text(data.user_count);
                    var m_counter = $(".m_count").text(data.merchant_count);

                    if ($(".count").text() >= 10) {
                        // window.location = "/users/follow/merchants";
                        $("#continue_follow").removeClass('disabled')
                        toastr.options.preventDuplicates = true;
                        toastr.success("Now click the Continue button to follow 5 or more stores of interest.");
                    } else if(data.merchant_count >= 5) {
                        // alert('Merchant completed');
                        // users/follow/merc hants

                        $.ajax({
                            url:'/users/follow/merchants',
                            type:'POST',
                            // data: {success,},
                            success:function(data){
                                // window.location = "/";
                                $("#continue_follow_merchant").removeClass('disabled');
                            },
                            error: function (data) {
                                toastr.options.preventDuplicates = true;
                                toastr.error("An error occured while following "+ reciever_full_name);
                                // var obj = jQuery.parseJSON( data.responseText );
                            }
                        });

                    }
                    // f_counter++;
                    // toastr.options.preventDuplicates = true;
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while following "+ reciever_full_name);
                    // var obj = jQuery.parseJSON( data.responseText );
                }
            });
    });

$(document).on('click', ".c_unfollow", function(e){

          // alert('clickrf now kilonshele');
            e.preventDefault();
        var follow_id = $(this).data("id");
            
            var reciever_email = $(this).data("email");
            var reciever_full_name = $(this).data("fname");

            // alert(reciever_email);
            // $(this).removeClass('unfollow').text(' follow');
            // $(this).addClass('follow');
             $(this).removeClass('c_unfollow');
            $(this).addClass('c_follow');
            $(this).removeClass('unfollow_btn');
            $(this).addClass('follow_btn');
            // $(this).remove('i');
            // $(this).remove('i');
            $(this).removeClass('fa fa-check');
            // $(this).removeClass('follow');
            // $(this).addClass('fa fa-user');
            // $(this).addClass('f-14');


            $.ajax({
                url:'/unfollow/'+reciever_email,
                type:'POST',
                data: {reference:reciever_email},
                success:function(data){
                    console.log(data);
                    var f_counter = $(".count").text(data.user_count);
                    var m_counter = $(".m_count").text(data.merchant_count);
                    

                    if ($(".count").text() >= 10) {
                        // window.location = "/users/follow/merchants";
                        $("#continue_follow_merchant").removeClass('disabled');

                        toastr.options.preventDuplicates = true;
                        toastr.success("Now follow 5 or more stores of interest by Tapping Continue Button.");
                    } else if(data.merchant_count >= 5) {
                        // alert('Merchant completed');
                        $.ajax({
                            url:'/users/follow/merchants',
                            type:'POST',
                            // data: {success,},
                            success:function(data){
                                // window.location = "/";
                                $("#continue_follow_merchant").removeClass('disabled');
                            },
                            error: function (data) {
                                toastr.options.preventDuplicates = true;
                                toastr.error("An error occured while following "+ reciever_full_name);
                                // var obj = jQuery.parseJSON( data.responseText );
                            }
                        });
                    }else if(data.user_count < 10){
                        $("#continue_follow").addClass('disabled')

                    }else if(data.merchant_count < 5) {
                        $("#continue_follow_merchant").addClass('disabled')
                    }
                    // alert(data.merchant_count);

                    // 
                    // alert(data);
                    // console.log(data);
                    // var current_count = $(".follow_count").text();
                    // current_count--;
                    // $(".follow_count").text(current_count);
                    // toastr.options.preventDuplicates = true;
                    // toastr.info("You unfollowed "+reciever_full_name);
                },
                error: function (data) {
                    toastr.options.preventDuplicates = true;
                    toastr.error("An error occured while following "+ reciever_full_name);
                    // var obj = jQuery.parseJSON( data.responseText );
                }
            });
    });

// dlete social notification

$(".del").click(function(e){
    e.preventDefault();
    $("#bridge_loader").show();
    var notification_id = $(this).data("payload");
    $(".notify_id"+notification_id).hide();
            $.ajax({

                         url: "/users/social_notification/delete/"+notification_id,
                         type: "GET",
                         data: {success:notification_id},
                         success: function(data){
                            // console.log(data);
                            $(".count_notify").text(data);
                            // count--;
                            // alert(count);
                            $("#bridge_loader").hide();
                            toastr.options.preventDuplicates = true;
                            toastr.info("Notification Removed!");
                            var holdNotifyDiv = setTimeout(function(){ 
                                $(".notify-dropdown").show(); 
                            }, 0.000);
                            
                            var notify_counter = $(".count_notify").text();
                            if (notify_counter == 0) {
                                $("#emptied_noification").show();
                                // alert(a);
                                 clearTimeout(holdNotifyDiv);
                                // alert('done');
                                // $(".notify-dropdown").css('display', 'none')

                            }
                         },error:function(){
                            toastr.options.preventDuplicates = true;
                            toastr.error("Looks like something went wrong from the server!", "Ooops");
                         }
            });
});


$("#querySelector").on("keyup", function(e){
        // alert('jdd');
        if ($("#querySelector").val() === '') {
            $(".dropdown-dark").hide();

        }
        else {

         $(".dropdown-dark").show();

        }
        var search_input = $("#querySelector").val();
        // alert($("#querySelector").val());
        $.ajax({

                         url: "/search/user/"+search_input,
                         type: "GET",
                         data: {user:search_input},
                         success: function(data){
                            // console.log(data);
                        var output = '<ul class="suggestions "  >';                            
                            if(data.results.length > 0){
                                // console.log(response.data);
                                $.each(data.results, function(key, val){
                                    // console.log(val);
                                    if (data.results.length > 0 ) {
                                        // alert('true');
                                        output += '<a href="" >'+' <li class="z-1000" ">';
                                        // output += '<div class="">'+
                                        output += '<span class="text-center hover">' + '<a class="p-l-20 c-brand" href='+val.link+'>' + val.name +'</a>' + '</span>'+
                                            '<small class="text-center price c-gray">' + " " + "" +val.type + "" + '</small><br>'
                                        '</div>';
                                        output += '</li> </a> <hr>';                                    
                                    
                                    }
                                });
                            }else{
                                        output += '<li class="z-1000" ">';
                                        // output += '<div class="">'+
                                        output += '<span class="text-center">' + '<a class="p-l-20 c-brand" >' +'No result found for "'+ search_input+'" </a>' + '</span>'+
                                              '<small class="text-center price c-gray">' + " " + "" + '</small><br>'
                                          '</div>';
                                        output += '</li> <hr>';   
                                        // output += '<li class="z-1000" > No Result found for + </li>';
                            }
                            output += '</ul>';

                            $(".dropdown-dark").html(output);
                            // }
                         },error:function(){
                            
                         }
            });
    });
$(document).on("click", function(e) {
     // $("#querySelector").hide
     var clear = '';
     $(".dropdown-dark").hide();
     $("#querySelector").val(clear);

});
 


// Scroll event begins for followers and followwing


var lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > lastScrollTop){
       // downscroll from top of the page code begins

   } else {
      // upscroll code
   }
   lastScrollTop = st;
});