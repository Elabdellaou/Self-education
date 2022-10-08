<template>
            <div class="check w-100 row row-cols-1 row-cols-md-2 rounded-3 m-0" >
                <div class="item d-flex justify-content-center align-items-center px-0 pb-2" >
                    <div class="text w-100 py-4 fs-5 text-center fw-bold rounded-3">
                        {{ answers[0] }}
                    </div>
                </div>
                <div class="item d-flex justify-content-center align-items-center px-0 pb-2" >
                    <div class="text w-100 py-4 fs-5 text-center fw-bold rounded-3">
                        {{ answers[1] }}
                    </div>
                </div>
                <div class="item d-flex justify-content-center align-items-center px-0 pb-2" >
                    <div class="text w-100 py-4 fs-5 text-center fw-bold rounded-3">
                        {{ answers[2] }}
                    </div>
                </div>
                <div class="item d-flex justify-content-center align-items-center px-0 pb-2" >
                    <div class="text w-100 py-4 fs-5 text-center fw-bold rounded-3">
                        {{ answers[3] }}
                    </div>
                </div>
            </div>
</template>
<script setup>
    import { defineProps,ref } from 'vue';
    import axios from 'axios';
    import { useStore } from 'vuex';
    const store = useStore();
    const props = defineProps({
        answers:{
            Type:Array,
            default:[]
        },
    })
    //check selected
    setTimeout(() => {
    let checks =document.querySelectorAll('.check .item .text');
    checks.forEach(element=>{
        element.addEventListener('click',()=>{
            checks.forEach(element=>{
                element.classList.remove('selected');
            })
        element.classList.add('selected');
    })
})
    }, 2000);

</script>
<style lang="scss">
    body .check .item .text{
    &:hover:not(.selected){
    color: #7896fa;
    border:none ;
    -webkit-box-shadow: 0 0 0 3px #7896fa !important;
    box-shadow: 0 0 0 3px #7896fa !important;
        &::after{
            border-top-color: #7896fa !important;
        }
    }
}
</style>
