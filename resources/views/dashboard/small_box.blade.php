 <div class="row">
     <div class="col-md-12">
         <div class="camera-container">
             <video id="cameraStream" autoplay></video>
         </div>
     </div>
 </div>


 @push('css')
     <style>
         /* Container for the camera video stream */
         .camera-container {
             position: relative;
             width: 500px;
             height: 200px;
             padding-bottom: 20px;
             /* 16:9 aspect ratio */
             background-color: #000;
             overflow: hidden;
         }

         /* Video styling */
         #cameraStream {
             position: absolute;
             top: 0;
             left: 0;
             width: 300px;
             height: 300px;
             object-fit: cover;
             /* Cover the entire container */
         }

         /* Utility classes for Bootstrap */
         .row {
             display: flex;
             flex-wrap: wrap;
             margin-right: -15px;
             margin-left: -15px;
         }

         .col-md-12 {
             position: relative;
             width: 100%;
             padding-right: 15px;
             padding-left: 15px;
         }
     </style>
 @endpush

 @push('scripts')
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             var video = document.getElementById('cameraStream');

             // Check if browser supports getUserMedia
             if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
                 navigator.mediaDevices.getUserMedia({
                         video: true
                     })
                     .then(function(stream) {
                         video.srcObject = stream;
                         video.play();
                     })
                     .catch(function(err) {
                         console.error("Error accessing the camera: " + err);
                     });
             } else {
                 alert("Sorry, your browser does not support getUserMedia");
             }
         });
     </script>
 @endpush
