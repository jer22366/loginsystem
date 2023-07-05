<head><link rel="stylesheet" href="{{ asset('css/login.css') }}"></head>
<div id='loginId'><p>會員登入系統</p></div>
<div id="login">
  <input v-model="account" placeholder="請輸入帳號" style="width: 300px;"></input><br>
  <input v-model="password" placeholder="請輸入密碼" style="width: 300px;"></input><br>
  <button v-on:click="submit">登入</button><br>
  <button v-on:click="register">創建新帳號</button>
</div>


<script src="https://cdn.jsdelivr.net/npm/vue@2.7.10/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

var sumbitlogin = new Vue({ 
  el: '#login',
  data:{
    account:'',
    password:'',
  },
  methods:{
    submit:function(account,password) {
        axios.post('/acc/log',{
        account:this.account,
        password:this.password
      }).then(response => {
          if(response.data==1){
            alert(response.data);
            window.location = '/managermainpage'
          }else if(response.data==0){
            alert(response.data);
            window.location = '/mainpage'
          }else{
            alert(response.data);
          }
      }).catch(error => {
        console.log(error);
      })
    },
    register(){
      window.location = '/registerpage';
    }
  }
})
</script>

