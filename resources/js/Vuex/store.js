import { createStore } from 'vuex'
import axios from 'axios'

const store = createStore({
  state () {
    return {
      questions:[],
      answers:[],
      Line_session:[],
      session:{}
    }
  },
  mutations: {
    async start (state,data) {
        axios.get("/session/"+data.id+"").then(response=>{
            if(response.data==false)
                location.replace("/404")
                state.session=response.data
            }).catch(error=>{
                location.replace("/404")
            });
        axios.get('/questions/'+data.id+'').then(response=>{
            state.questions=response.data
        }).catch(error=>{
            location.replace("/404")
        });
        axios.get('/answers/'+data.id+'').then(response=>{
            state.answers=response.data
        }).catch(error=>{
            location.replace("/404")
        });
        axios.get('/Line_sessions/'+data.id+'').then(response=>{
            state.Line_session=response.data
        }).catch(error=>{
            location.replace("/404")
        });
    }
  },
  getters:{

  },
  actions:{

  }
})
export default store;
