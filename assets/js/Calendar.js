console.log(800)

$(document).ready(function() {

  var calendar = $('#calendar').fullCalendar({
    
   editable:true,
   header:{
    left:'prev,next today',
    center:'title',
    right:'month,agendaWeek,agendaDay'
   },
  //  events:'index.php?action=load_callendar',


  events:function(){

    $("select").on("change", function(){
      id_match = this.value;
      console.log(this.value);

       $.ajax({
            url: 'index.php?action=Terrin_callendar',
            type: 'POST',
            data: {
                      id_match: this.value
                  },
            success:function()
            {
                console.log(data);
            }

      })
    })
  },

   selectable:true,
   selectHelper:true,
   select: function(start, end, allDay)
   {
    var start = moment(start).format("Y-MM-DD HH:mm:ss");
 	 	var end = moment(end).format("Y-MM-DD HH:mm:ss");
    var id_client = $('#id_client').val();
    var id_match = $('#id_match').val();

     $.ajax({
      url:"index.php?action=insert_callendar",
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
          alert("Added Successfully");
          console.log(start,end,id_client,id_match);
      }



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
 });





