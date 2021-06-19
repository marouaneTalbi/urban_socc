$(document).ready(function() {
  let matchId = null;
  const calendar = $('#calendar').fullCalendar({ // Creating the FC    
    editable:true,
    header:{
     left:'prev,next today',
     center:'title',
     right:'month,agendaWeek,agendaDay'
    }, 
    events: function(start, end, timezone, callback) {  // Defining the event source as a function
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
      return duration.asHours() <= 1.5;
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

     const checkoutButton = $("#submit");
     checkoutButton.on('click',function(e){
     e.preventDefault();
      $.ajax({
       url:"index.php?action=insert_callendar_Admin",
       type:"POST",
       data:
       {
            id_client:id_client,
            id_match:id_match,
            start:start,
            end:end
       },
       success:function()
       {
         calendar.fullCalendar('refetchEvents');
         document.location.reload();
        alert("Added Successfully");
       }
      })
    })
    },
    editable:true,
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
    eventClick:function(event)
    {
     if(confirm("Are you sure you want to remove it?"))
     {
      var id_res = event.id_res;
  
      $.ajax({
  
       url:"index.php?action=Supp_callendar",
       type:"POST",
       data:{id_res:id_res},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Event Removed");
        console.log(id_res)
       }
      })
     }
    },
   });
$("#id_match").on("change", function () {
    matchId = $(this).val();  
    calendar.fullCalendar('refetchEvents');
  });
});
