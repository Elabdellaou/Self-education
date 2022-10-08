<template>
            <div class="wrapper w-100 row row-cols-1 row-cols-md-2 rounded-3 m-0" >
                <div class="item d-flex justify-content-center align-items-center px-0 pb-2" >
                    <div class="text w-100 py-4 fs-5 text-center text-nor fw-bold rounded-3">
                        {{ answers[0] }}
                    </div>
                </div>
                <div class="item d-flex justify-content-center align-items-center px-0 pb-2" >
                    <div class="text w-100 py-4 fs-5 text-center text-nor fw-bold rounded-3">
                        {{ answers[1] }}
                    </div>
                </div>
                <div class="item d-flex justify-content-center align-items-center px-0 pb-2" >
                    <div class="text w-100 py-4 fs-5 text-center text-nor fw-bold rounded-3">
                        {{ answers[2] }}
                    </div>
                </div>
                <div class="item d-flex justify-content-center align-items-center px-0 pb-2" >
                    <div class="text w-100 py-4 fs-5 text-center text-nor fw-bold rounded-3">
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

    setTimeout(() => {
    let dragArea=document.querySelector(".wrapper");
    new Sortable(dragArea,{
                        handle:'.item',
                        animation:200
    });
}, 2200);

</script>
