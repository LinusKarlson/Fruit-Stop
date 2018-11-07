var app = new Vue({
  el: '#app',
  data: {
    students: "",
	kategori: ""
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
		console.log(this.kategori);
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
    }
  }
})