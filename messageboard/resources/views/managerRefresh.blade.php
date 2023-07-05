<head><link rel="stylesheet" href="{{ asset('css/refresh.css') }}"></head>
<div id="refresh">
    <div>名字<input v-model="name" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>帳號<input v-model="account" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>密碼<input v-model="password" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>性別
        <input type="radio" id="one" value=1 v-model="sex" />
	    <label for="male">男</label>

	    <input type="radio" id="two" value=2 v-model="sex" />
	    <label for="female">女</label>
    </div>
    <div>生日<input v-model="birthday" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>信箱<input v-model="email" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div>電話<input v-model="phone" placeholder="請輸入內容" style="width: 300px;"></input></div>
    <div><button v-on:click="submit">確認</button></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.7.10/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    /*連接資料庫讓輸入框裡有會員的資料*/
    var mainpage = new Vue({
        el:'#refresh',
        data:{
            name:'',
            account:'',
            password:'',
            sex:'',
            birthday:'',
            email:'',
            phone:'',
            acnt:1
        },
        mounted (){
            axios.post('/getData',{
            }).then(response => {
                this.name = response.data['m_name'];
                this.account = response.data['m_username'];
                this.password = response.data['m_password'];
                this.sex = response.data['m_sex'];
                this.birthday = response.data['m_birthday'];
                this.email = response.data['m_email'];
                this.phone = response.data['m_phone'];

            }).catch(error => {
                console.log(error);
            })
        },
        methods:{
            submit(name,account,password,sex,birthday,email,phone,acnt){
                axios.post('/refreshData',{
                    name:this.name,
                    account:this.account,
                    password:this.password,
                    sex:this.sex,
                    birthday:this.birthday,
                    email:this.email,
                    phone:this.phone,
                    acnt:this.acnt
                })
                .then(response => {
                    alert(response.data);
                    window.location = '/managermainpage';
                })
                .catch(error => {
                    console.log(error);
                })
            }
        },computed: {
            // 计算属性，根据选中的值返回对应的数值
            valueToSelect: function() {
            return parseInt(this.sex);
            }
        },
        watch: {
            // 监听 valueToSelect 变化，根据数值选中对应的单选按钮
            valueToSelect: function(newValue) {
            this.sex = newValue.toString();
            }
        }
    })
</script>