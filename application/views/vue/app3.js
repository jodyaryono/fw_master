
new Vue({
  el: "#app",
  data: {
    title: "Signature QRCode",
    text: "",
    name:" tanda tangan",
    qrcode: new QRious({ size: 150 }),
  },

  methods: {
    sign: function (event) {
      //alert('signed');
      const params={par1:"1"};
      const headers={
        "Auth":"AUTH10920",
        'API-KEY':"Valid"
      }
      axios.get('https://yesno.wtf/api',params,{headers})
        .then(response=>
          {
            console.log(response);
            this.text=response.data.answer;
          }
        )
        .catch(function (error) {
          this.text= 'Error! Could not reach the API. ' + error;
          //console.log(error);
        });

      //this.text="www.jodyaryono.com"

    }
  },
  computed: {
    newQRCode() {
      this.qrcode.value = this.text;
      return this.qrcode.toDataURL();
    },
  },
});
