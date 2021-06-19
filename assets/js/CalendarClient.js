$(document).ready(function() {

    var prix = $('#prix').val();
    console.log($('#id_client').val());
    let matchId = null;
    const calendar = $('#calendar').fullCalendar({  
      editable:true,
      header:{
       left:'prev,next today',
       center:'title',
       right:'agendaWeek,agendaDay'
      }, 
      defaultView: 'agendaWeek',//
      lang:'fr',
      events: function(start, end, timezone, callback) {  
        $.ajax({
            method: 'POST',
            url: 'index.php?action=Terrin_callendar',
            data: {id_match: matchId},
            dataType: 'json',
            success: function(events) {
              console.log(events)
              callback(events);
            }
        });
      },
        minTime: '09:00:00', 
        maxTime: '21:00:00', 
      selectable:true,
      selectHelper:true,
      selectAllow: function(selectInfo) { 
        var duration = moment.duration(selectInfo.end.diff(selectInfo.start));
        if(duration.asHours() == 1 ){
            prix = 100;
            console.log(prix,duration)
        }else if(duration.asHours() == 0.5 ){
            prix = 50;
            console.log(prix)
        }else{
            prix = 150;
            console.log(prix)
        }
        var laDuree = duration.asHours() <= 1.5;
        return laDuree;
   },

select: function(start, end, allDay)
{
  if(start.isBefore(moment())) {
    $('#calendar').fullCalendar('unselect');
    alert('Impossible de séléctionnez cette date')
    document.location.reload();
   }
    var start = moment(start).format("Y-MM-DD HH:mm:ss");
    var end = moment(end).format("Y-MM-DD HH:mm:ss");
    var id_client = $('#id_client').val();
    var id_match = $('#id_match').val();
    var firstname = $('#firstname').val();
    var name = $('#name').val();
    var email = $('#email').val();

    const stripe = Stripe("pk_test_51IM8ZrEwRtoFpDAHs6Iu7d92N4DPiPWs4MjYP3BhnlNyf0Lz3itqGdpugMYLXIMyHZeQvxNyH4FCEAAtoJv9b7V600AGKAwSrE");
    const checkoutButton = $("#submit");
    checkoutButton.on('click',function(e){ });
      
     $.ajax({
      url:"index.php?action=payment_cal",
      type:"POST",
      data:
      {
           id_client:id_client,
           id_match:id_match,
           start:start,
           end:end,
           prix:prix,
           email:email,
           name:name,
           firstname:firstname,
      },
        success:function(session)
        {
            calendar.fullCalendar('refetchEvents');
            alert("Added Successfully");
            console.log(start,end,id_client,id_match,prix);
            return stripe.redirectToCheckout({sessionId:session.id})
        }
     })

      },
     });
  $("#id_match").on("change", function () {
      matchId = $(this).val();  
      calendar.fullCalendar('refetchEvents');
    });
  });
