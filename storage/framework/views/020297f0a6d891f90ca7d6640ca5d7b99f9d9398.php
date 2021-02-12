<?php $__env->startSection('content'); ?>
    <div>
        <div>
            <span>
                In progress
            </span>
        </div>
        <div>
            <span>
                Upcoming
            </span>
        </div>
    </div>
    <div>
        <table>
            <thead>
            <tr>
                <th scope="col">Code</th>
                <th  scope="col">Room</th>
            </tr>
            </thead>
            <tbody >
            <tr>
                <td>
                    Loading...
                </td>
            </tr>
            </tbody>
        </table>
        <table >
            <thead>
            <tr>
                <th scope="col">Code</th>
                <th scope="col">Room</th>
            </tr>
            </thead>
            <tbody >
            <tr>
                <td>
                    Loading...
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function(){
            setInterval(function(){
                $.ajax({
                    url:'/display',
                    type:'GET',
                    dataType:'json',
                    success:function(response){
                        $('#receivedReservations').empty();
                        if(response.reservationsReceived.length>0){
                            var reservations ='';
                            for(var i=0;i<response.reservationsReceived.length;i++){
                                reservations=reservations+'<tr><li>'+response.reservationsReceived[i].code+'-'+response.reservationsReceived[i].user.room+'-'+response.reservationsReceived[i].status+'</li>';
                                reservations += '<th scope="row">' + response.reservationsReceived[i].code + '</th>'+
                                    '<td>' + response.reservationsReceived[i].room + '</td></tr>';
                            }
                            $('#receivedReservations').append(reservations);
                        }
                        $('#inProgressReservations').empty();
                        if(response.reservationsInProgress.length>0){
                            var reservations ='';
                            for(var i=0;i<response.reservationsInProgress.length;i++){
                                reservations=reservations+'<tr><li>'+response.reservationsInProgress[i].code+'-'+response.reservationsInProgress[i].user.room+'-'+response.reservationsInProgress[i].status+'</li>';
                                reservations += '<th scope="row">' + response.reservationsInProgress[i].code + '</th>'+
                                    '<td>' + response.reservationsInProgress[i].room + '</td></tr>';
                            }
                            $('#inProgressReservations').append(reservations);
                        }
                    },error:function(err){
                        $('#receivedReservations').empty();
                        $('#receivedReservations').append('<tr><td> Could not retrieve data.</td></tr>');
                    }
                })
            }, 5000);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.display', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/laravel/resources/views/display/index.blade.php ENDPATH**/ ?>