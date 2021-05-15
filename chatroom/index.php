<!doctype html>
<html>
  <head>
    <title>Let's Chat!</title>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
      #messages {
        display: block;
        width: 500px;
        height: 300px;
      }
      .hidden {
        display: none;
      }
      .formatted{
        background-color: rgba(0,0,255,0.2);
        cursor: pointer;
      }
      .rooms{
        display: inline;
        float: none;
      }
    </style>
  </head>
  <body>

    <h1>Let's Chat!</h1>
    <a id='admin' href="home.php">Admin</a>
    <br>
    <div id="panel_name">
      Name: <input type="text" id="name">
      <button id="savename">Chat</button>
    </div>
    <br>
    <div id='divinfo'>
      <button id='newchatroom' class='hidden'>New Chatroom</button>
      <br>
      <button id='changerooms'>Change Rooms</button>
      <button id='startnewroom'>Start New Room</button>
      <br>
      
      <br>
      <form id='chatnamediv' class='hidden' method='GET' action='newRoom.php'>
        Chatroom Name: <input type='text' id='inputchatname' name="newchatroom">
        <input type="submit" id='set'>
      </form>
    </div>
    <h3 id='youare'>You are: </h3>
    <br>

    <div id="panel_chat" class="hidden">
      <textarea id="messages" readonly></textarea>
      <br>
      <input type="text" id="newmessage" placeholder='message'>
      <button id="sendmessage">Send Message</button>
      <br>
      <input type='text' id='changename' placeholder='change name'>
      <button id='buttonnewname'>Change Name</button>
    </div>


    <h3 id='nameofroom'></h3>
    <script>
      function getCookie(name) {
        const value = `; ${document.cookie}`;
        const parts = value.split(`; ${name}=`);
        if (parts.length === 2) return parts.pop().split(';').shift();
      }

      let nameofroom = document.getElementById('nameofroom');

      if (getCookie('newroom')){
        let newroom = getCookie('newroom');
        window.localStorage.setItem('room',newroom);
      }
      
      let changerooms = document.getElementById('changerooms');
      let room = window.localStorage.getItem('room')
      let panel = document.getElementById('panel_chat');
      let youare = document.getElementById('youare');
      let panel_name = document.querySelector("#panel_name");
      let panel_chat = document.querySelector("#panel_chat");
      let name = document.querySelector("#name");
      let savename = document.querySelector("#savename");
      let changename = document.querySelector("#changename");
      let buttonnewname = document.querySelector('#buttonnewname');
      let prevname = window.localStorage.getItem('name');
      let admin = document.getElementById('admin');
      let changeRoomForm = document.createElement('select');
      changeRoomForm.id='changeRoomForm';
      let newchatroom = document.getElementById('newchatroom');
      let divinfo = document.getElementById('divinfo');
      let chatnamediv = document.querySelectorAll('#chatnamediv')[0];
      if (window.localStorage.getItem('name') == null){
        changerooms.classList.add('hidden');
        startnewroom.classList.add('hidden');
        admin.classList.add('hidden');
        nameofroom.classList.add('hidden');
      }else{
        youare.innerHTML = "You are: " + window.localStorage.getItem('name');
        nameofroom.innerHTML = "Room: " + window.localStorage.getItem('room');
      }
      let startroom = document.getElementById('startnewroom');
      startroom.onclick = function(){
        changeRoomForm.classList.add('hidden')
        chatnamediv.classList.remove('hidden');
      }
      let flag = 0;
      changerooms.onclick = function(){
        
          changeRoomForm.classList.remove('hidden')
          chatnamediv.classList.add('hidden')
          flag += 1;
          if (flag == 1){
            $.ajax({
              type: 'POST',
              url: 'data/chatroomslist.txt',
              data: {
              },
              success: function(data, status){
                let lines = data.split("\n");
                let selectroom = document.createElement('option');
                selectroom.innerHTML = "Select Room";
                changeRoomForm.appendChild(selectroom)
                divinfo.appendChild(changeRoomForm);
                for (let i = 0; i < lines.length - 1; i++){
                  let rname = lines[i].substring(0,lines[i].length - 4);
                  let input = document.createElement('option')
                  input.value = rname;
                  input.innerHTML = rname;
                  changeRoomForm.appendChild(input);
                  changeRoomForm.onchange = function(event){

                    console.log(changeRoomForm.value)
                    $.ajax({
                      type: "POST",
                      url: "data/" + changeRoomForm.value + ".txt",
                      data: {
                      },
                      success: function(data, status){
                        admin.classList.remove("hidden");
                        changeRoomForm.classList.add("hidden");
                        panel_chat.classList.remove('hidden');
                        panel_name.classList.add('hidden');
                        nameofroom.innerHTML = "Room: " + changeRoomForm.value;
                        nameofroom.classList.remove('hidden')
                        window.localStorage.setItem('room', changeRoomForm.value);
                      },
                      error: function(req, data, status){
                        console.log("error");
                      }
                    })
                  }
                }
              },
              error: function(req, data, status){
                console.log('error');
              }
            });
          }
      }
      newchatroom.onclick = function(){
        newchatroom.classList.add('hidden');
        changerooms.classList.remove('hidden');
        startroom.classList.remove('hidden');
        let flag = 0;
        changerooms.onclick = function(){
          changeRoomForm.classList.remove('hidden')
          chatnamediv.classList.add('hidden')
          flag += 1;
          if (flag == 1){
            $.ajax({
              type: 'POST',
              url: 'data/chatroomslist.txt',
              data: {
              },
              success: function(data, status){
                let lines = data.split("\n");
                let selectroom = document.createElement('option');
                selectroom.innerHTML = "Select Room";
                changeRoomForm.appendChild(selectroom)
                divinfo.appendChild(changeRoomForm);
                for (let i = 0; i < lines.length - 1; i++){
                  let rname = lines[i].substring(0,lines[i].length - 4);
                  let input = document.createElement('option')
                  input.value = rname;
                  input.innerHTML = rname;
                  changeRoomForm.appendChild(input);
                  changeRoomForm.onchange = function(event){
                    $.ajax({
                      type: "POST",
                      url: "data/" + changeRoomForm.value + ".txt",
                      data: {
                      },
                      success: function(data, status){
                        admin.classList.remove("hidden");
                        changeRoomForm.classList.add("hidden");
                        panel_chat.classList.remove('hidden');
                        panel_name.classList.add('hidden');
                        nameofroom.innerHTML = "Room: " + changeRoomForm.value;
                        nameofroom.classList.remove('hidden')
                        window.localStorage.setItem('room', changeRoomForm.value);
                      },
                      error: function(req, data, status){
                        console.log("error");
                      }
                    })
                  }
                }
              },
              error: function(req, data, status){
                console.log('error');
              }
            });
          }
        }
        startroom.onclick = function(){
          changeRoomForm.classList.add('hidden');
          chatnamediv.classList.remove('hidden');
        }
      }
      savename.onclick = function(event) {
        newchatroom.classList.remove('hidden');
        prevname = name.value;
        name.value = '';
        window.localStorage.setItem('name',prevname);
        if (prevname.length > 0) {
          if (getCookie('room')){
            panel_chat.classList.remove('hidden');
            panel_name.classList.add('hidden');
          }
        }
        youare.classList.remove('hidden');
        youare.innerHTML = "You are: " + window.localStorage.getItem('name');
      }
      console.log(prevname);
      if (prevname){
        panel_chat.classList.remove('hidden');
        panel_name.classList.add('hidden');
      }
      else{
        panel_chat.classList.add('hidden');
        panel_name.classList.remove("hidden");
        youare.classList.add('hidden');
      }
      buttonnewname.onclick = function(){
        let newuser = changename.value;
        changename.value = '';
        window.localStorage.setItem('name',newuser);
        youare.innerHTML = "You are: " + newuser;
      }
      function getCookie(name) {
        var dc = document.cookie;
        var prefix = name + "=";
        var begin = dc.indexOf("; " + prefix);
        if (begin == -1) {
            begin = dc.indexOf(prefix);
            if (begin != 0) return null;
        }
        else
        {
            begin += 2;
            var end = document.cookie.indexOf(";", begin);
            if (end == -1) {
            end = dc.length;
            }
        }
        return decodeURI(dc.substring(begin + prefix.length, end));
      } 
      let messages = document.querySelector("#messages");
      let newmessage = document.querySelector("#newmessage");
      let sendmessage = document.querySelector("#sendmessage");
      roomname = getCookie('room');
      let newdiv = document.createElement('div');
      panel.appendChild(newdiv);
      newdiv.innerHTML = '';
      sendmessage.onclick = function(event) {
        let roomname = window.localStorage.getItem('room');
        console.log('clicked')
        username = window.localStorage.getItem('name');
        let msg = newmessage.value;
        newmessage.value = '';
        $.ajax({
          type: 'GET',
          url: 'savemessage.php',
          data: {
            message: msg,
            nickname: username,
            room: roomname
          },
          success: function(data, status) {            
            if (data == "badword"){
              newdiv.innerHTML = 'You used a bad word!';
            }
            else if (data == 'too short'){
              newdiv.innerHTML = 'Message too short!'
            }
            else{
              newdiv.innerHTML = '';
            }
          },
          error: function(req, data, status) {
          }
        });
      }
      function getData() {
        let roomname = window.localStorage.getItem('room');
        if (roomname == null){
          console.log('---')
          setTimeout( getData, 1000 );
        }
        else{
          $.ajax({
            type: 'GET',
            url: 'data/' + roomname + '.txt',
            data:{
            },
            success: function(data, status) {
              console.log('sent')
              scrollToBottom();
              messages.value = data;
              setTimeout( getData, 1000 );
            },
            error: function(req, data, status){
              console.log('error')
            }
          });
        }
        
      }
      getData();
      function scrollToBottom(){
        scroll = document.getElementById('messages');
        body = document.querySelector('body');
        scroll.onmouseleave = function(event){
          scroll.scrollTop = scroll.scrollHeight;
        }
        body.onmouseenter = function(event){
          scroll.scrollTop = scroll.scrollHeight;
        }
        
      }
    </script>
  </body>
</html>



