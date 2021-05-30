$(document).ready(function() {

    var prix = $('#prix').val();
    console.log($('#id_client').val());
    let matchId = null;
    const calendar = $('#calendar').fullCalendar({  
      editable:true,
      header:{
       left:'prev,next today',
       center:'title',
       right:'month,agendaWeek,agendaDay'
      }, 
      locale: 'es',
      lang:'es',
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
        minTime: '09:00:00', // display from 16 to
        maxTime: '21:00:00', // 23
      selectable:true,
      selectHelper:true,
      selectAllow: function(selectInfo) { 
        var duration = moment.duration(selectInfo.end.diff(selectInfo.start));
        if(duration.asHours() == 1 ){
            prix = 100;
            console.log(prix)
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

  //   selectAllow: function(selectInfo) {
  // //   //since we're only interested in whole days, set all times to the start/end of their respective day
  //   selectInfo.start.startOf("minute");
  //   selectInfo.end.startOf("minute");

  //   var evts = $("#calendar").fullCalendar("clientEvents",function(evt){
  //       var st = evt.start.clone().startOf("minute");
  //       console.log(st)
  //       if (evt.end) { 
  //         var ed = evt.end.clone().startOf("minute"); }
  //       else {
  //         ed = st; 
  //         }
  
  //   //   //return true if the event overlaps with the selection
  //     return (selectInfo.start.isSameOrBefore(ed) && selectInfo.end.isSameOrAfter(st));
      
  // })

  // //return true if there are no events overlapping that day
  // return evts.length == 0;
  //  },

select: function(start, end, allDay)
{
    var start = moment(start).format("Y-MM-DD HH:mm:ss");
    var end = moment(end).format("Y-MM-DD HH:mm:ss");
    var id_client = $('#id_client').val();
    var id_match = $('#id_match').val();
    var firstname = $('#firstname').val();
    var name = $('#name').val();
    var email = $('#email').val();

    const stripe = Stripe("pk_test_51IM8ZrEwRtoFpDAHs6Iu7d92N4DPiPWs4MjYP3BhnlNyf0Lz3itqGdpugMYLXIMyHZeQvxNyH4FCEAAtoJv9b7V600AGKAwSrE");
    const checkoutButton = $("#submit");
    checkoutButton.on('click',function(e){
    e.preventDefault();

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
 });
      },
      editable:false,
      eventResize:function(event)
      {
       var start = moment(event.start).format("Y-MM-DD HH:mm:ss");
         var end = moment(event.end).format("Y-MM-DD HH:mm:ss");
       var id_res = event.id_res;
       $.ajax({
        url:"index.php?action=modif_callendar",
        type:"POST",
        data:{start:start, end:end, id_res:id_res},
        success:function(){
         calendar.fullCalendar('refetchEvents');
         alert('Event Update');
        }
       })
      },
      eventDrop:function(event)
      {
       var start = moment(event.start).format("Y-MM-DD HH:mm:ss");
       var end = moment(event.end).format("Y-MM-DD HH:mm:ss");
       var id_res = event.id_res;
       $.ajax({
        url:"index.php?action=modif_callendar",
        type:"POST",
        data:{start:start, end:end, id_res:id_res},
        success:function()
        {
         calendar.fullCalendar('refetchEvents');
         alert("Event Updated");
        }
       });
      },
     });
  $("#id_match").on("change", function () {
      matchId = $(this).val();  
      calendar.fullCalendar('refetchEvents');
    });
  });
