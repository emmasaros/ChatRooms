<!doctype html>
<html>
  <head>
    <title>Let's Chat!</title>

    <!-- need to fix one alert and multiple username changes -->
    <style>

     @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');

     body{
      font-family: 'Roboto Mono', monospace;
      background-color:#c6cdf5;
     }

      #messages {
        display: block;
        width: 500px;
        height: 300px;
      }
      .hidden {
        display: none;
      }

      /* Dropdown Button */
      .roomBtn {
        background-color: #030303;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
        margin: 10px;
      }

      /* The container <div> - needed to position the dropdown content */
      .rooms {
        position: relative;
        display: inline-block;
      }

      /* Dropdown Content (Hidden by Default) */
      .room_options {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }

      /* Links inside the dropdown */
      .room_options button {
        color: black;
        padding: 20%;
        display: block;
      }

      /* Change color of dropdown links on hover */
      .room_options button:hover {background-color: #ddd;}

      /* Show the dropdown menu on hover */
      .rooms:hover .room_options {display: block;}

      /* Change the background color of the dropdown button when the dropdown content is shown */
      .room:hover .roomBtn {background-color: #3e8e41;}

    </style>
  </head>
  <body>

    <h1>Let's Chat!</h1>

    <div id="panel_name">
      Name: <input type="text" id="name">
      <button id="savename">Chat</button>
      <p id="valid" class="hidden">Please enter a username.</p>
    </div>

    <br>
      <div class="rooms">
        <button class="roomBtn">Rooms</button>
          <div class="room_options">
           <button id="room_1">Room 1</button>
           <button id="room_2">Room 2</button>
           <button id="room_3">Room 3</button>
          </div>
        <p id="room_alert" class="hidden">Please select a chat room.</p>
      </div>

    <div id="panel_chat" class="hidden">
      <textarea id="messages" readonly></textarea>
      <br>
      <input type="text" id="newmessage">
      <button id="sendmessage">Send Message</button>
      <p id="alert" class="hidden">Please enter a message.</p>
      <p id="rejected" class="hidden">Invalid input. Message rejected.</p>
    </div>

    <div id="panel_chat_two" class="hidden">
      <textarea style="width:500px; height:300px;" id="messages_2" readonly></textarea>
      <br>
      <input type="text" id="newmessage_2">
      <button id="sendmessage_2">Send Message</button>
      <p id="alert_2" class="hidden">Please enter a message.</p>
      <p id="rejected_2" class="hidden">Invalid input. Message rejected.</p>
    </div>

    <div id="panel_chat_three" class="hidden">
      <textarea style="width:500px; height:300px;" id="messages_3" readonly></textarea>
      <br>
      <input type="text" id="newmessage_3">
      <button id="sendmessage_3">Send Message</button>
      <p id="alert_3" class="hidden">Please enter a message.</p>
      <p id="rejected_3" class="hidden">Invalid input. Message rejected.</p>
    </div>

    <div class="hidden" id="change"> New Username: <input type="text" id="newName"></div>
      <button class="hidden"id="newUsername">Change Username</button>
    <br>
    <a href="admin.php">Admin Login</a>



    <!-- bring in the jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- custom script for this application -->
    <script>
      //SET UP BUTTON CLICK TO NEW ROOMS.TXT
      // grab some DOM refs
      let panel_name = document.querySelector("#panel_name");
      let panel_chat = document.querySelector("#panel_chat");
      let panel_chat_two = document.querySelector("#panel_chat_two");
      let panel_chat_three = document.querySelector("#panel_chat_three");
      let name = document.querySelector("#name");
      let savename = document.querySelector("#savename");
      let newNameBtn = document.querySelector("#newUsername");
      let newUser = document.querySelector("#newName");
      let change = document.querySelector("#change");
      let validUser = document.querySelector('#valid');

      let body = document.querySelector('body');
      let roomOne = document.querySelector("#room_1");
      let roomTwo = document.querySelector("#room_2");
      let roomThree = document.querySelector("#room_3");
      let roomAlert = document.querySelector("#room_alert");
      let roomChoice;


      // when the user clicks on the save name we need to progress to the next phase of the program
      let username;
      savename.onclick = function(event) {

        // grab the name the user entered
        username = name.value;

        // make sure it has at least one character in it
        if (username.length > 0 && roomChoice!=null) {

            //save
            localStorage.setItem('user',username);
            // hide this panel
            panel_name.classList.add('hidden');
            room_alert.classList.add('hidden');
            validUser.classList.add('hidden');
            newNameBtn.classList.remove('hidden');
            if (roomChoice == 1) {
              panel_chat.classList.remove('hidden');
              panel_chat_two.classList.add('hidden');
              panel_chat_three.classList.add('hidden');

            }
            else if (roomChoice == 2){
              panel_chat_two.classList.remove('hidden');
              panel_chat.classList.add('hidden');
              panel_chat_three.classList.add('hidden');

            }
            else if (roomChoice == 3){
              panel_chat_two.classList.remove('hidden');
              panel_chat.classList.add('hidden');
              panel_chat_three.classList.add('hidden');
              
            }
          
        }
        else{
          if (username <= 0) {
            validUser.classList.remove('hidden');
          }
          else if (roomChoice == null) {
            room_alert.classList.remove('hidden');
          }
      }
    }
      //stylistic selection for user
      roomOne.onclick = function(event){
        roomChoice = 1;
        roomOne.style.color = '#fc9f9f';
        roomTwo.style.color = 'black';
        roomThree.style.color = 'black';
        body.style.backgroundColor = '#fc9f9f';


        if(username == null){
          validUser.classList.remove('hidden');
        }

        else if(roomChoice==1 && username.length > 0){
            // show the chat panel_chat
            localStorage.setItem('user',username);
            panel_name.classList.add('hidden');
            panel_chat.classList.remove('hidden');
            newNameBtn.classList.remove('hidden');
            message_output=messages;

            panel_chat_two.classList.add('hidden');
            panel_chat_three.classList.add('hidden');
            validUser.classList.add('hidden');
            room_alert.classList.add('hidden');
        }

      }

      roomTwo.onclick = function(event){
        roomChoice = 2;
        roomOne.style.color = 'black';
        roomTwo.style.color = '#7dd198';
        roomThree.style.color = 'black';
        body.style.backgroundColor = '#7dd198'
        if(username == null){
          validUser.classList.remove('hidden');
        }
        else if(roomChoice==2 && username.length > 0){
            // show the chat panel_chat
            localStorage.setItem('user',username);
            panel_name.classList.add('hidden');
            panel_chat_two.classList.remove('hidden');
            message_output=messages_2;

            newNameBtn.classList.remove('hidden');
            panel_chat.classList.add('hidden');
            panel_chat_three.classList.add('hidden');
            validUser.classList.add('hidden');
            room_alert.classList.add('hidden');
        }

      }

      roomThree.onclick = function(event){
        roomChoice = 3;
        roomOne.style.color = 'black';
        roomTwo.style.color = 'black';
        roomThree.style.color = '#84d3e3';
        body.style.backgroundColor = '#84d3e3'
        if(username == null){
          validUser.classList.remove('hidden');
        }
        else if(roomChoice==3 && username.length > 0){
            // show the chat panel_chat
            localStorage.setItem('user',username);
            panel_name.classList.add('hidden');
            newNameBtn.classList.remove('hidden');
            panel_chat_three.classList.remove('hidden');
            message_output=messages_3;

            panel_chat_two.classList.add('hidden');
            panel_chat.classList.add('hidden');
            validUser.classList.add('hidden');
            room_alert.classList.add('hidden');

          }
      }

      

      //localStorage to remember 
      let previousUser = localStorage.getItem('user');
      //have this logic checked
      if(previousUser!=null){
          panel_name.classList.add('hidden');
          newNameBtn.classList.remove('hidden');
          panel_chat.classList.add('hidden');
          username = previousUser;
      }

      newNameBtn.onclick = function(event) {
        console.log("newName");
        //add hide again after completion
        change.classList.remove('hidden');
        let newNickname = newUser.value;
        // make sure it has at least one character in it
        if (newNickname.length > 0) {
          console.log("length ok");
          username = newNickname;
          newUser.value = "";
          localStorage.setItem('user',username);
          change.classList.add('hidden');

        }
        else{
          console.log("too short");

        }
      }
      //wire rooms
      let messages = document.querySelector("#messages");
      let messages_2 = document.querySelector("#messages_2");
      let messages_3 = document.querySelector("#messages_3");

      let newmessage = document.querySelector("#newmessage");
      let newmessage_2 = document.querySelector("#newmessage_2");
      let newmessage_3 = document.querySelector("#newmessage_3");

      let sendmessage = document.querySelector("#sendmessage");
      let sendmessage_2 = document.querySelector("#sendmessage_2");
      let sendmessage_3 = document.querySelector("#sendmessage_3");

      let alertUser = document.querySelector('#alert');
      let alertUser_2 = document.querySelector('#alert_2');
      let alertUser_3 = document.querySelector('#alert_3');

      let rejected = document.querySelector('#rejected');
      let rejected_2 = document.querySelector('#rejected_2');
      let rejected_3 = document.querySelector('#rejected_3');

      let message_output;

      //default scrolling behavior
      messages.onmouseout = function(){
        messages.scrollTop = messages.scrollHeight;
      }
      messages_2.onmouseout = function(){
        messages_2.scrollTop = messages_2.scrollHeight;
      }
      messages_3.onmouseout = function(){
        messages_3.scrollTop = messages_3.scrollHeight;
      }

      function autoScroll(message_output){
        message_output.scrollTop = message_output.scrollHeight;
        console.log(message_output);
      }

      // when the user chooses to chat we need to send that data to the server to be stored
      sendmessage.onclick = function(event) {

        // package up this message for chat room 1 and send it to the server to be stored for later use
        let msg = newmessage.value;

        console.log(roomChoice);

        $.ajax({

          type: 'POST',
          url: 'savemessage.php',
          data: {
            roomChoice: roomChoice,
            message: msg,
            nickname: username
          },
          success: function(data, status) {
            console.log("success!",data);

            if(!alertUser.classList.contains('hidden')){
              alertUser.classList.add('hidden');
            }
            if(data=='failed'){
              alertUser.classList.remove('hidden');

            }
            if(!rejected.classList.contains('hidden')){
              rejected.classList.add('hidden');
            }

            if (data =='rejected') {
              rejected.classList.remove('hidden');
            }
          },
          error: function(req, data, status) {
            console.log(req,data,status);
          }

        });

      }



      // when the user chooses to chat we need to send that data to the server to be stored
      sendmessage_2.onclick = function(event) {

        // package up this message for chat room 1 and send it to the server to be stored for later use
        let msg_2 = newmessage_2.value;

        console.log(roomChoice);

        $.ajax({

          type: 'POST',
          url: 'savemessage.php',
          data: {
            roomChoice: roomChoice,
            message: msg_2,
            nickname: username
          },
          success: function(data, status) {
            console.log("success!",data);

            if(!alertUser_2.classList.contains('hidden')){
              alertUser_2.classList.add('hidden');
            }
            if(data=='failed'){
              alertUser_2.classList.remove('hidden');
            }
            if(!rejected_2.classList.contains('hidden')){
              rejected_2.classList.add('hidden');
            }

            if (data =='rejected') {
              rejected_2.classList.remove('hidden');
            }
            //scrolling behavior
            let hover2;
            messages_2.addEventListener('mouseover',function(){
            hover2=true;
              
            });
            if(hover2!=true){
              messages_2.scrollTop = messages_2.scrollHeight;
              console.log('scrolling');
            }
          },
          error: function(req, data, status) {
            console.log(req,data,status);
          }

        });

      }


      // when the user chooses to chat we need to send that data to the server to be stored
      sendmessage_3.onclick = function(event) {

        // package up this message for chat room 1 and send it to the server to be stored for later use
        let msg_3 = newmessage_3.value;

        console.log(roomChoice);

        $.ajax({

          type: 'POST',
          url: 'savemessage.php',
          data: {
            roomChoice: roomChoice,
            message: msg_3,
            nickname: username
          },
          success: function(data, status) {
            console.log("success!",data);

            if(!alertUser_3.classList.contains('hidden')){
              alertUser_3.classList.add('hidden');
            }
            if(data=='failed'){
              alertUser_3.classList.remove('hidden');
            }
            if(!rejected_3.classList.contains('hidden')){
              rejected_3.classList.add('hidden');
            }

            if (data =='rejected') {
              rejected_3.classList.remove('hidden');
            }
            //scrolling behavior
            let hover3;
            messages_3.addEventListener('mouseover',function(){
            hover3=true;
              
            });
            if(hover3!=true){
              messages_3.scrollTop = messages_3.scrollHeight;
              console.log('scrolling');
            }
          },
          error: function(req, data, status) {
            console.log(req,data,status);
          }

        });

      }

      let first_output=true;;
      // function to grab data from the server
      function getData() {

        let urlChoice;
        if (roomChoice == 1) {
          urlChoice = 'data/room1.txt?nocache=';
        }
        else if(roomChoice == 2){
          urlChoice = 'data/room2.txt?nocache=';
        }
        else{
          urlChoice = 'data/room3.txt?nocache=';
        }

        // contact the text file and grab its current value
        $.ajax({
          type: 'GET',
          url: urlChoice+Math.random(),
          success: function(data, status) {

          if(message_output){
            message_output.value = data;
          //scrolling behavior
            if(first_output){
              autoScroll(message_output);
              first_output=false;  
            }
          }  
            setTimeout( getData, 1000 );
          }

        });


      }
      getData();



    </script>
  </body>
</html>
