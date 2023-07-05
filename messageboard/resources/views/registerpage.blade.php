<head><link rel="stylesheet" href="{{ asset('css/register.css') }}"></head>
<div id="register">
    <div>名字<input v-model="name" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>帳號<input v-model="account" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>密碼<input v-model="password" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>性別
        <input type="radio" id="one" value=1 v-model="sex" />
	    <label for="male">男</label>

	    <input type="radio" id="two" value=2 v-model="sex" />
	    <label for="female">女</label>
    </div>
    <div>生日</div>
    <div>西元<input v-model="year" style="width: 50px;">年</input>
            <input v-model="month" style="width: 25px;"></input>月
            <input v-model="day" style="width: 25px;"></input>日</div>
    <div>信箱<input v-model="email" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>電話<input v-model="phone" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div><button v-on:click="submit">確認</button></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.7.10/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var sumbitregister = new Vue({
        el:'#register',
        data:{
            name:'',
            account:'',
            password:'',
            sex:'',
            birthday:'',
            email:'',
            phone:'',
            year:'',
            month:'',
            day: ''
        },
        methods:{
            submit:function (name,account,password,sex,birthday,email,phone,year,month,day){
                    axios.post('/acc/reg',{
                        Name:this.name,
                        Account:this.account,
                        Password:this.password,
                        Sex:this.sex,
                        Birthday:this.birthday,
                        Email:this.email,
                        Phone:this.phone,
                        year:this.year,
                        month:this.month,
                        day:this.day
                })
                .then(response => {
                    alert(response.data);
                    window.location = '/';
                })
                .catch(function (error) {
                    console.log(error.data);
                })
            }
        }
    })
</script>