
export default{
  state:{
    token: localStorage.getItem('access_token') || null
  },
  mutations:{
    retrieveToken(state,token){
      state.token=token

    },
    destroyToken(state){
      state.token=null
    }
  },
  getters:{
    loggedIn(state){
      return state.token!=null

    }
  },
  actions:{
    destroyToken(context){
if(context.getters.loggedIn){
  axios.post('api/logout').then((res)=>{
  localStorage.removeItem('access_token')
  context.commit('destroyToken')
}
)
}
    },
    retrieveToken(context ,credentials){
      axios.post('api/login',{
        email:credentials.email,
        password:credentials.password
      }).then((res)=>{


      const token = res.data.data.access_token


      localStorage.setItem('access_token',token);

      context.commit('retrieveToken',token)
      }).catch((error)=>{
        console.log(console.error)
      })
    },
    retrieveToken2(context ,credentials){
      axios.post('api/register',{
        s_id:credentials.s_id,
        name:credentials.name,
        email:credentials.email,
        password:credentials.password
      }).then((res)=>{


      const token = res.data.data.access_token


      localStorage.setItem('access_token',token);

      context.commit('retrieveToken',token)
      }).catch((error)=>{
        console.log(console.error)
      })
    }

  }


};
