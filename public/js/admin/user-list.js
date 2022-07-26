
$(function () {
  'use strict';

  var datatableObj ;
  
  $(document).ready(function(){      

      loadDataTable();
      bindEvents();

  });

  var loadDataTable = () => {
      datatableObj =  $('#data_table').DataTable({
        // ajax: 'data/objects.txt',
        // columns: [
        //     { data: 'name' },
        //     { data: 'position' },
        //     { data: 'office' },
        //     { data: 'extn' },
        //     { data: 'start_date' },
        //     { data: 'salary' },
        // ],
         "aaSorting": [],
    });
  }

  var bindEvents = () => {

      $(".delete-user").on("click",function(){
          var id = $(this).data('id');
          if(id != undefined && id != '') {
             deleteUser(id);
          }

      })
  }

  var deleteUser = (id) => {
      Swal.fire({
            title: '',
            text : 'Do you want to delete this user?',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            
          }).then((result) => {
            if (result.isConfirmed) {
                console.log(id);
                // $(".tr_"+id).remove();
                //  setTimeout(function(){
                //    // $('#data_table').dataTable().fnDraw();
                //     //loadDataTable();

                //  },200) 
                 
                

                $.ajax({
                type: "GET",
                url: REMOTE_DELETE_URL+'/'+id,
                data: {},                            
                processData: false,
                contentType: false,
                cache : false, 
            
                success: function(data) {
                    
                    if(data.success == '0') {
                        if(data.message != undefined && data.message != '') {
                              Swal.fire({
                                        icon: 'error',
                                        title: '',
                                        confirmButtonColor: '#33b5f7',
                                        text: data.message,
                                      })
                        }
                    } else if(data.success == '1') {



                        if(data.message != undefined && data.message != '') {
                              Swal.fire({
                                        icon: 'success',
                                        title: '',
                                        confirmButtonColor: '#33b5f7',
                                        text: data.message,
                                      }).then((result) => {
                                          window.location.reload();
                                      });
                                   
                        }
                    } 
                },
                error : function() {
                }
              });
              
            } 
          })
  }

});


