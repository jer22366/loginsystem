<head><link rel="stylesheet" href="{{ asset('css/managerMainpage.css') }}"></head>
<div id='loginId'><p>會員後台系統</p></div>
<div id="managermainpage">
  <table>
    <tr>
      <th>名字</th>
      <th>帳號</th>
      <th>密碼</th>
      <th>性別</th>
      <th>生日</th>
      <th>Email</th>
      <th>手機號碼</th>
      <th>帳號權限</th>
    </tr>
    <tr v-for="data in accountdata">
        <td>@{{ data.m_name }}</td>
        <td>@{{ data.m_username }}</td>
        <td>@{{ data.m_password }}</td>
        <td>@{{ data.m_sex }}</td>
        <td>@{{ data.m_birthday }}</td>
        <td>@{{ data.m_email }}</td>
        <td>@{{ data.m_phone }}</td>
        <td>@{{ data.m_level }}</td>
      <td>
        <button v-on:click="refresh(data)">更新</button>
        <button v-on:click="remove(data)">刪除</button>
      </td>
    </tr>
  </table>
</div>
<div id='logout'><button v-on:click="logout">登出</button></div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.7.10/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    var mainpage = new Vue({
        el:'#managermainpage',
        data:{
            accountdata:[],
        },
        mounted (){
            axios.post('/manageShowData',{
            }).then(response => {
                this.accountdata = response.data;
            }).catch(error => {
                console.log(error);
            })
        },methods: {
            refresh(data) {
                axios.post('/managerSetSession',{
                    data:data
                }).then(response => {
                    window.location ='/managerRefresh';
                }).catch(error => {
                    console.log(error);
                })
            },
            remove(data) {
                axios.post('/removeData',{
                    data:data
                }).then(response => {
                    console.log(response.data);
                }).catch(error => {
                    console.log(error);
                })
            }
        }
    })
    var logout = new Vue({
      el:'#logout',
      methods: {
            logout() { 
              sessionStorage.removeItem('key');
              window.location = '/';
            }
      }
    })
</script>