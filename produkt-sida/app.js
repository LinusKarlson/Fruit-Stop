var app = new Vue({
  el: '#app',
  data: {
    students: "",
	kategori: "",
	produkt: ""
  },
  methods: {
    allRecords: function(){

      axios.get('ajax.php')
      .then(function (response) {
         app.students = response.data;
      })
      .catch(function (error) {
         console.log(error);
      });
    },
    recordByKategori: function(){
	
      if(this.kategori != ''){

        axios.get('ajax.php', {
           params: {
             kategori: this.kategori
           }
        })
        .then(function (response) {
           app.students = response.data;
        })
        .catch(function (error) {
           console.log(error);
        });
      }
    },
	recordByProdukt: function(){
		console.log(this.produkt);
		console.log("fff");
		
		if(this.produkt != ''){

        axios.get('ajax.php', {
           params: {
             produkt: this.produkt
           }
        })
        .then(function (response) {
           app.students = response.data;
        })
        .catch(function (error) {
           console.log(error);
        });
      }
		
	}
  }
})