class Events{
  constructor(){
    this.live = document.getElementById("live");
    this.whoami = document.getElementById("whoami");
    this.setup = document.getElementById("setup");
    this.gamelist = document.getElementById("gamelist");
    this.contact = document.getElementById("contact");
    this.stream = document.getElementById("stream-zone");
    this.sign = document.getElementById("sign_up_btn");
    this.leftPosition = 0;
    this.topPosition = 0;
    this.scaleStream = 1;
    this.vitesse = 0;
    this.interval;
    this.canMove = true;
    this.addListeners();
  }


    streamMove(){
        if(this.scaleStream >= 0.42){
          this.vitesse += 0.01;
          this.scaleStream -= this.vitesse;
          this.stream.style.transform = "scale(" + this.scaleStream + ")";
          this.vitesse = 0;
          console.log(this.scaleStream);
        }
        if(this.topPosition <= 50){
          this.vitesse += 1;
          this.topPosition += this.vitesse;
          this.stream.style.top = this.topPosition + "%";
          this.vitesse = 0;
          console.log(this.topPosition);
        }
        if(this.leftPosition <= 49.2){
          this.vitesse += 0.6;
          this.leftPosition += this.vitesse;
          this.stream.style.left = this.leftPosition + "%";
          this.vitesse = 0;
          console.log(this.leftPosition);
        }else{
          this.vitesse = 0;
          this.canMove = false;
          clearInterval(this.interval);
        }
    }

   reverseStreamMove(){
      if(this.scaleStream <= 1){
        this.vitesse += 0.01;
        this.scaleStream += this.vitesse;
        this.stream.style.transform = "scale(" + this.scaleStream + ")";
        this.vitesse = 0;
        console.log(this.scaleStream);
      }
      if(this.topPosition >= 0){
        this.vitesse += 1;
        this.topPosition -= this.vitesse;
        this.stream.style.top = this.topPosition + "%";
        this.vitesse = 0;
        console.log(this.topPosition);
      }
      if(this.leftPosition >= 0){
        this.vitesse += 0.6;
        this.leftPosition -= this.vitesse;
        this.stream.style.left = this.leftPosition + "%";
        this.vitesse = 0;
        console.log(this.leftPosition);
      }else{
        this.vitesse = 0;
        this.canMove = true;
        clearInterval(this.interval);
      }
  }

  eventMove(e){
    if(this.canMove){
    this.live.style.color = "#78e08f";
    this.interval = setInterval(() => {
      this.streamMove()
    }, 6);
    this.stream.style.position = "fixed";
    }
  }


  addListeners(){
    this.live.addEventListener("click", (e) =>{
      if(this.canMove === false){
      this.interval = setInterval(()=> {
        this.reverseStreamMove()
      }, 6);
      this.live.style.color ="white";
      this.stream.style.position = "absolute";
      document.getElementById("whoami_display").style.display = "none";
      document.getElementById("setup_display").style.display = "none";
      document.getElementById("gamelist_display_user").style.display = "none";
      document.getElementById("contact_form_display").style.display = "none";
      document.getElementById("sign_up_display").style.display = "none";
      document.getElementById("profil_display").style.display = "none";
      }
    });

    this.whoami.addEventListener("click", (e) =>{
      this.eventMove();
      document.getElementById("whoami_display").style.display = "block";
      document.getElementById("setup_display").style.display = "none";
      document.getElementById("gamelist_display_user").style.display = "none";
      document.getElementById("contact_form_display").style.display = "none";
      document.getElementById("sign_up_display").style.display = "none";
    });

    this.setup.addEventListener("click",(e) =>{
      this.eventMove();
      document.getElementById("whoami_display").style.display = "none";
      document.getElementById("setup_display").style.display = "block";
      document.getElementById("gamelist_display_user").style.display = "none";
      document.getElementById("contact_form_display").style.display = "none";
      document.getElementById("sign_up_display").style.display = "none";
    });

    this.gamelist.addEventListener("click", (e) =>{
      this.eventMove();
      document.getElementById("whoami_display").style.display = "none";
      document.getElementById("setup_display").style.display = "none";
      document.getElementById("gamelist_display_user").style.display = "block";
      document.getElementById("contact_form_display").style.display = "none";
      document.getElementById("sign_up_display").style.display = "none";
    });

    this.contact.addEventListener("click", (e) =>{
      this.eventMove();
      document.getElementById("whoami_display").style.display = "none";
      document.getElementById("setup_display").style.display = "none";
      document.getElementById("gamelist_display_user").style.display = "none";
      document.getElementById("contact_form_display").style.display = "block";
      document.getElementById("sign_up_display").style.display = "none";
    });

    this.sign.addEventListener("click" , (e) => {
      e.preventDefault();
      this.eventMove();
      document.getElementById("whoami_display").style.display = "none";
      document.getElementById("setup_display").style.display = "none";
      document.getElementById("gamelist_display_user").style.display = "none";
      document.getElementById("contact_form_display").style.display = "none";
      document.getElementById("sign_up_display").style.display = "block";
    });
  }
}

var events = new Events();
