import {initializeApp,getApps} from "https://www.gstatic.com/firebasejs/9.6.8/firebase-app.js";
import {ref,uploadBytesResumable,getStorage} from 'https://www.gstatic.com/firebasejs/9.6.8/firebase-storage.js'

const firebaseConfig = {
    apiKey: "AIzaSyDYdNzBxUNoSM66jzGgabVLNIJv4ZPttGI",
    authDomain: "zenazon.firebaseapp.com",
    projectId: "zenazon",
    storageBucket: "zenazon.appspot.com",
    messagingSenderId: "452672903911",
    appId: "1:452672903911:web:4378c146e99c3af0f5a042"
  };

  $(document).ready(function(){

    if (getApps().length < 1) {  
        var app = initializeApp(firebaseConfig);
    }

    const storage = getStorage(app);

    $('#file').change((e) => {
        if(e.target.files[0]){
            const file = e.target.files[0];
            const reader = new FileReader();
            reader.addEventListener('load', (e) => {
                $("#image").attr("src",event.target.result);
            });
            reader.readAsDataURL(file);

            const date = Date.now();
            const extension = e.target.files[0].type.split("/")[1];
            const name = date+extension;
            const storageRef = ref(storage, "/productos/"+name);
            const task = uploadBytesResumable(storageRef,e.target.files[0]);

            task.on('state_changed',
                async function progress(snaptshot){

                },
                async function error(err){
                    alert("Error en la imagen, Inténta otra vez");
                    $("#image").attr("src","<?php echo constant('URL').'/public/img/picture.png'?>");
                    $('#nameFile').attr("value","error.png");
                    return false;
                },
                async function complete(){
                    console.log("Ready");
                    $('#nameFile').attr("value",name);
                });

        }else{
            $("#image").attr("src","<?php echo constant('URL').'/public/img/picture.png'?>");
            $('#nameFile').attr("value","error.png");
            return false;
        }
        });
    });