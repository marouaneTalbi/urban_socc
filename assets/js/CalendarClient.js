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
      // scrollTime: '08:00',
      // height: 900,
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
          
  if(start.isBefore(moment())) {//
    $('#calendar').fullCalendar('unselect');
    alert('Impossible de séléctionnez cette date')
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
     });
  $("#id_match").on("change", function () {
      matchId = $(this).val();  
      calendar.fullCalendar('refetchEvents');
    });
  });
//_________________________________________________________________________________________________________________________

// $(document).ready(function() {

//   var prix = $('#prix').val();
//   console.log($('#id_client').val());
//   let matchId = null;
//       var events = []
//     var calendar = $('#calendar').fullCalendar({
//         header: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'agendaWeek,agendaDay'
//         },
//         defaultView: 'agendaWeek',
//         allDaySlot: false,
//         height: 700,
//         weekends: true,
//         lang: 'fr',

//     events:function(start, end, timezone, callback) {  
//       $.ajax({
//           method: 'POST',
//           url: 'index.php?action=Terrin_callendar',
//           data: {id_match: matchId},
//           dataType: 'json',
//           success: function(events) {
//             console.log(events)
//             callback(events);
//           }
//       });
//     },
//       minTime: '09:00', 
//       maxTime: '21:00',
//     selectable:true,
//     selectHelper:true,
//     select: function(start, end, allDay){

//       var duration = moment.duration(end.diff(start));
//       if(duration.asHours() == 1 ){
//           prix = 100;
//           console.log(prix)
//       }else if(duration.asHours() == 0.5 ){
//           prix = 50;
//           console.log(prix)
//       }else if(duration.asHours() == 1.5){
//           prix = 150;
//           console.log(prix,duration.asHours())
//       }
//       var laDuree = duration.asHours() <= 1.5;

//       //  if(start.isBefore(moment())) {
//       //   $('#calendar').fullCalendar('unselect');
//       //   alert('Impossible de séléctionnez cette date')
//       //  }
//       //  else if(duration.asHours() > 1.5){
//       //   $('#calendar').fullCalendar('unselect');
//       //   alert('Impossible de Reserver plus d 1h30 ')
//       //  }

    
//        var start = moment(start).format("YYYY-DD-MM HH:mm:ss");
//           var end = moment(end).format("YYYY-DD-MM HH:mm:ss");
//         var id_client = $('#id_client').val();
//         var id_match = $('#id_match').val();
//         var firstname = $('#firstname').val();
//         var name = $('#name').val();
//         var email = $('#email').val();
    
//         const stripe = Stripe("pk_test_51IM8ZrEwRtoFpDAHs6Iu7d92N4DPiPWs4MjYP3BhnlNyf0Lz3itqGdpugMYLXIMyHZeQvxNyH4FCEAAtoJv9b7V600AGKAwSrE");
//         const checkoutButton = $("#submit");
//         checkoutButton.on('click',function(e){
//         e.preventDefault();
    
//          $.ajax({
//           url:"index.php?action=payment_cal",
//           type:"POST",
//           data:
//           {
//                id_client:id_client,
//                id_match:id_match,
//                start:start,
//                end:end,
//                prix:prix,
//                email:email,
//                name:name,
//                firstname:firstname,
//           },
//           success:function(session)
//           {
//               calendar.fullCalendar('refetchEvents');
//               alert("Added Successfully");
//               console.log(start,end,id_client,id_match,prix);
//               return stripe.redirectToCheckout({sessionId:session.id}), false,laDuree;
    
//           }
//          })
//      });
//           },
  //   select: function(start, end,allDay) {
      
  //     var duration = moment.duration(end.diff(start));
  //     if(duration.asHours() == 1 ){
  //         prix = 100;
  //         console.log(prix)
  //     }else if(duration.asHours() == 0.5 ){
  //         prix = 50;
  //         console.log(prix)
  //     }else if(duration.asHours() == 1.5){
  //         prix = 150;
  //         console.log(prix,duration.asHours())
  //     }
  //     var laDuree = duration.asHours() <= 1.5;

  //      if(start.isBefore(moment())) {
  //       $('#calendar').fullCalendar('unselect');
  //       alert('Impossible de séléctionnez cette date')
  //      }
  //      else if(duration.asHours() > 1.5){
  //       $('#calendar').fullCalendar('unselect');
  //       alert('Impossible de Reserver plus d 1h30 ')
  //      }

  //      var start = moment(start).format("YYYY-DD-MM HH:mm:ss");
  //         var end = moment(end).format("YYYY-DD-MM HH:mm:ss");
  //         var id_client = $('#id_client').val();
  //         var id_match = $('#id_match').val();
  //         var firstname = $('#firstname').val();
  //         var name = $('#name').val();
  //         var email = $('#email').val();

  //         const stripe = Stripe("pk_test_51IM8ZrEwRtoFpDAHs6Iu7d92N4DPiPWs4MjYP3BhnlNyf0Lz3itqGdpugMYLXIMyHZeQvxNyH4FCEAAtoJv9b7V600AGKAwSrE");
  //         const checkoutButton = $("#submit");
  //         checkoutButton.on('click',function(e){
  //         e.preventDefault();

  //         $.ajax({
  //           url:"index.php?action=payment_cal",
  //           type:"POST",
  //           data:
  //           {
  //               id_client:id_client,
  //               id_match:id_match,
  //               start:start,
  //               end:end,
  //               prix:prix,
  //               email:email,
  //               name:name,
  //               firstname:firstname,
  //           },
  //           success:function(session)
  //           {
  //               calendar.fullCalendar('refetchEvents');
  //               alert("Added Successfully");
  //               console.log(start,end,id_client,id_match,prix);
  //               return stripe.redirectToCheckout({sessionId:session.id}) , false,laDuree;
  //           }
  //       })
  //     })
  // },
//    });
// $("#id_match").on("change", function () {
//     matchId = $(this).val();  
//     calendar.fullCalendar('refetchEvents');
//   });
// });





//   $(document).ready(function () {

//     var events = []
//     var calendar = $('#calendar').fullCalendar({
//         header: {
//             left: 'prev,next today',
//             center: 'title',
//             right: 'agendaWeek,agendaDay'
//         },
//         defaultView: 'agendaWeek',
//         defaultTimedEventDuration: '01:00',
//         allDaySlot: false,
//         scrollTime: '08:00',
//         businessHours: {
//             start: '7:00',
//             end: '19:00',
//         },
//         height: 650,
//         minTime: '7:00',
//         maxTime: '19:00',
//         weekends: false,
//         lang: 'fr',
//         eventOverlap: function(stillEvent, movingEvent) {
//             return true;
//         },
//         editable: false,
//         selectable: true,
//         selectHelper: true,



//         select: function(start, end) {
//             if(start.isBefore(moment())) {
//                 $('#calendar').fullCalendar('unselect');
//                 alert('Impossible de séléctionnez cette date')
//                 return false;
//             } else {
//                 var duration = (end - start) /1000;
//                 if(duration == 1800) {
//                     // set default duration to 1 hr.
//                     end = start.add(30, 'mins');
//                     var eventData = {
//                         title: $('.content').data('user'),
//                         start: start,
//                         end: end
//                     }
//                     calendar.fullCalendar('renderEvent', eventData);
//                     return calendar.fullCalendar('select', start, end);
//                 }
//             }
//         },
//         dayClick: function(date, jsEvent, view) {
//             if(!date.isBefore(moment())) {
//                 events.push(date.format())
//             }
//         },
//         events: function (start, end, timezone, callback) {
//             var dates = []
//             $.ajax({
//                 url: $('.content').data('url'),
//                 type: "GET",
//                 dataType: "json",
//                 success: function (data) {
//                     $.each(data, function (i, e) {
//                         dates.push({
//                             title: e.user.FirstName,
//                             start: e.date
//                         })
//                     })
//                     callback(dates)
//                 },
//                 error: function () {
//                     alert("Erreur serveur")
//                 }
//             })
//         },
//         eventRender: function(event, element) {
//             var start = moment(event.start).fromNow();
//             element.attr('title', start);
//         },
//     });
//     $('#sendEvents').click(function (e) {
//         if (events === undefined || events.length == 0) {
//             alert("Vous devez d'abord selectionnez au moins une date de rendez-vous !")
//             e.preventDefault()
//         } else {
//             sessionStorage.setItem('myArray', events);
//         }
//     })
// })