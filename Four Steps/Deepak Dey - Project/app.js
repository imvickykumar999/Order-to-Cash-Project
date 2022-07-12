var firebaseConfig = {
    apiKey: "AIzaSyBhluvr3xwT3Tddr_FhCdk5juh19CAO6LE",
    authDomain: "orderfullfillment-38232.firebaseapp.com",
    projectId: "orderfullfillment-38232",
    databaseURL: "https://orderfullfillment-38232-default-rtdb.firebaseio.com",
    storageBucket: "orderfullfillment-38232.appspot.com",
    messagingSenderId: "228731063649",
    appId: "1:228731063649:web:0675718439b44784f00920"
  };

  firebase.initializeApp(firebaseConfig);

  database = firebase.database();

  var ref = database.ref("Products/4961");
  ref.on("value", gotData);

  var reff = database.ref("Inventory");
  reff.on("value", gotdata);

  var show,notshow;

  function gotData(data){

    var scores = data.val();
    show = scores.details.count;
  }

  function gotdata(data){
    var scores = data.val();
    notshow = scores.details.count;
    console.log(notshow);
  }
  
  function print() {
    if(show > notshow){
      console.log("checking");
      alert("you can't purchase more than "+ notshow +" products");
      function sendEmail() {
        Email.send({
          Host : "smtp.gmail.com",
          Username : "username",
          Password : "password",
          To : 'asdf@gmail.com',
          Subject : "Regarding Cancillation of your order",
          Body : "Order canceled due to out of stock"
        }).then(
          message => alert(message)
        );
      }
    }
  }

  function update() {
    firebase.database().ref('Inventory').set({
      a1234 : notshow-show,
    });
    console.log("success")

  }
  var products = "6565";
