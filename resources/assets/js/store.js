
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
      console.log(token)

      localStorage.setItem('access_token',token);

      context.commit('retrieveToken',token)
      }).catch((error)=>{
        console.log(console.error)
      })
    }
  }


};
