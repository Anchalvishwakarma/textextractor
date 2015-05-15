/**
 * Created by webonise on 13/5/15.
 */
$(document).ready(function(){


  //if search text is empty nothing happen
    $('#btn').click(function(){


         //get textbox value check empty
          var textToSearch = $.trim( $('#txtSearch').val());

          if(  textToSearch != '' )
         {

             var ArrayToSend =[];
             //var count=0;

            $('.filetag').each(function(){

               if(  $(this).is(':checked') )
               {
                   ArrayToSend.push( $(this).prev().data("path") ) ;
                   //count++;
               }

            });

             if (typeof ArrayToSend !== 'undefined' && ArrayToSend.length > 0) {


                 $.ajax({
                         url:'http://anchal.text.webonise.com/getresults',
                         type: 'post',
                         data:{arrdata:ArrayToSend,searchdata:textToSearch},
                         success: function(returndata) {
                           //called when successful
                            console.log(returndata);
                            $('#result').html(returndata)
                            $('#searchBlock').hide();

                         },
                         error: function(e) {
                           //called when there is an error
                           console.log(e.message);
                        }

                        })//ajax

             }else{
                 alert('No File Selected');
             }


         }else{
             alert('Please Enter text To Search');
         }

    })     //btn click





    /*
    * @dirtag click function
    * @<input type='checkbox' class="dirtag">
    * @onClick of dirtag checkbox under its structure make all element checked and unchecked
    * */

    $('.dirtag').click(function(){

         var currLi ='';

        $(this).prev().click(); //previous anchor clicked for open current directory structure

        if ( $(this).is(":checked") )
        {
            //make all child checked if dir checbox is checked
            $(this).closest('li').find('.dirtag,.filetag').each( function(){

                $(this).prop('checked', true);
            } )

        }else
        {

            //make all child unchecked if dir checbox is unchecked
            $(this).closest('li').find('.dirtag,.filetag').each( function(){

                $(this).prop('checked', false);
            } )
        }

    })//end dir-tag click



    //back button function
    $(Document).on('click','#back',function(){
          window.location='http://anchal.text.webonise.com/extractor'
    })

})//end of ready