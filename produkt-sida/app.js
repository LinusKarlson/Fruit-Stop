var app = new Vue({
  el: '#app',
  data: {
    students: "",
    id: 0
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
    recordByID: function(){
      if(this.id > 0){

        axios.get('ajax.php', {
           params: {
             id: this.id
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