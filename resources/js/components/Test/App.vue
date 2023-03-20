<template>
    <div class="w-100 d-flex h-100 flex-column" style="overflow: hidden">
        <div class="w-100 d-flex flex-column">
            <div
                class="header pt-0 px-5 w-100 d-flex flex-row justify-content-between"
            >
                <div></div>
                <div
                    id="clock"
                    class="fs-5 d-flex px-3 py-2 flex-row bg-light text-nor"
                >
                    <i class="bi bi-alarm-fill pe-2"></i
                    ><span>{{ minutes < 10 ? "0" + minutes : minutes }}</span
                    >:<span>{{
                        secondes < 10 ? "0" + secondes : secondes
                    }}</span>
                </div>
                <div class="lift d-flex justify-content-center">
                    <div class="checkbox-div me-4 fw-bold fs-5 rounded-circle">
                        <label for="#checkbox-mode" class="px-1 py-2 bg-light">
                            <input
                                type="checkbox"
                                name=""
                                id="checkbox-mode"
                                style="display: none"
                            />
                            <div class="icon text-nor fs-4">
                                <i
                                    class="bi bi-brightness-high-fill text-nor"
                                ></i>
                            </div>
                        </label>
                    </div>
                    <div id="close_test" class="px-1 py-2 bg-light text-nor">
                        <span class="text-nor fw-bold fs-4" @click="leftTest()"
                            ><i class="fa-solid fa-power-off"></i
                        ></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="main w-100" style="height: 77%">
            <div class="container h-100">
                <div
                    class="image-svg d-flex align-items-end"
                    style="height: 25%"
                >
                    <img
                        src="/Images/test_1.svg"
                        class="w-100 h-100"
                        alt=""
                        style="object-fit: contain"
                    />
                </div>
                <div class="question position-relative mb-3">
                    <span
                        class="question-number rounded-pill fs-6 px-3 py-2 text-white"
                        >Question Nº {{ i + 1 }}</span
                    >
                    <div
                        class="question-text py-5 px-5 fs-6 rounded-3 text-center"
                    >
                        {{ q[i].text }}
                    </div>
                </div>
                <resultVue
                    v-if="q[i].type == 'result'"
                    :question="q[i]"
                    v-model="result_text"
                ></resultVue>
                <orderVue
                    v-else-if="q[i].type == 'order'"
                    :answers="answers"
                ></orderVue>
                <checkVue v-else :answers="answers"></checkVue>
            </div>
        </div>
        <div class="w-100 footer-test">
            <div class="container d-flex flex-row justify-content-between py-3">
                <button
                    class="btn btn-war border-0 fw-bold shadow-primary btn-primary rounded-pill px-4"
                    @click="i > 0 ? i-- : i"
                >
                    Back
                </button>
                <button
                    class="btn btn-war border-0 fw-bold shadow-primary btn-primary rounded-pill px-4"
                    @click="Answer_Question()"
                >
                    Save
                </button>
            </div>
        </div>
    </div>
</template>
<script setup>
import resultVue from "./Type/result.vue";
import orderVue from "./Type/order.vue";
import checkVue from "./Type/check.vue";
import { onMounted, ref, watch } from "vue";
import { useStore } from "vuex";
import axios from "axios";
const store = useStore();
let i = ref(0);
// let days = ref(0);
let secondes = ref(0);
let minutes = ref(0);
let result_text = ref("");
// let hours = ref(0);
let time = ref(0);
let q = ref({ 0: { id: 0, title: "", text: "", image: "", type: "result" } });
let answers = ref([]);
onMounted(() => {
    setTimeout(() => {
        time.value = setInterval(() => {
            secondes.value++;
        }, 1000);
    }, 3000);
    store.commit("start", {
        id: window.location.href.split("/").pop(),
    });
    setTimeout(() => {
        q.value = store.state.questions;
        reset_Array();
    }, 2000);
    //mutation
    //dispatch
    //console.log(store.state.count)
});
watch(secondes, (newValue, oldValue) => {
    if (newValue == 60) {
        secondes.value = 0;
        minutes.value++;
    }
});
// watch(minutes, (newValue, oldValue) => {
//     if (newValue == 60) {
//         minutes.value = 0;
//         hours.value++;
//     }
// });
// watch(hours, (newValue, oldValue) => {
//     if (newValue == 24) {
//         hours.value = 0;
//         days.value++;
//     }
// });
//sort table
function leftTest() {
    window.location.replace("/");
}
function Answer_Question() {
    let l = "";
    store.state.Line_session.forEach((Line_session) => {
        if (q.value[i.value].id == Line_session.question_id) {
            l = Line_session.id;
        }
    });
    if (q.value[i.value].type == "result") {
        if (result_text.value != "") {
            if (i.value < 9) {
                Answer_DB(result_text.value, l);
                i.value++;
                reset_Array();
            } else Answer_DB_End(result_text.value, l);
            result_text.value = "";
            document.querySelector(".main_test_result input").focus();
        } else {
            Swal.fire({
                icon: "error",
                iconColor: "#6478eb",
                title: "Answer is empty!",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    } else if (q.value[i.value].type == "check") {
        let selected = document.querySelector(".check .item .text.selected");
        if (selected != null) {
            if (i.value < 9) {
                Answer_DB(selected.textContent, l);
                i.value++;
                reset_Array();
            } else Answer_DB_End(selected.textContent, l);

            let checks = document.querySelectorAll(".check .item .text");
            checks.forEach((element) => {
                element.classList.remove("selected");
            });
        } else {
            Swal.fire({
                icon: "error",
                iconColor: "#6478eb",
                title: "Choose one answer!",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    } else {
        let orders = document.querySelectorAll(".wrapper .item .text");
        if (i.value < 9) {
            axios
                .post("/answer_question_order", {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    question_id: q.value[i.value].id,
                    order_1: orders[0].textContent,
                    order_2: orders[1].textContent,
                    order_3: orders[2].textContent,
                    order_4: orders[3].textContent,
                    id: l,
                })
                .then((response) => {})
                .catch((error) => {
                    console.log(error);
                });
            i.value++;
            reset_Array();
        } else {
            let h;
            let m;
            let s;
            s =
                secondes.value >= 10
                    ? secondes.value.toString() + "s"
                    : "0" + secondes.value.toString() + "s";
            m = minutes.value % 60;
            m = m >= 10 ? m.toString() + "m " : "0" + m.toString() + "m ";
            h = parseInt(minutes.value / 60);
            h = h >= 10 ? h.toString() + "h " : "0" + h.toString() + "h ";
            let time = h + m + s;
            axios
                .post("/answer_question_order_end", {
                    _token: $('meta[name="csrf-token"]').attr("content"),
                    question_id: q.value[i.value].id,
                    session_id: store.state.session.id,
                    order_1: orders[0].textContent,
                    order_2: orders[1].textContent,
                    order_3: orders[2].textContent,
                    order_4: orders[3].textContent,
                    time: time,
                    id: l,
                })
                .then((response) => {
                    window.location.replace("/");
                })
                .catch((error) => {
                    console.log(error);
                    // console.log(error)
                });
        }
    }
}
function Answer_DB(answer, l) {
    axios
        .post("/answer_question", {
            _token: $('meta[name="csrf-token"]').attr("content"),
            question_id: q.value[i.value].id,
            answer_text: answer,
            id: l,
        })
        .then((response) => {})
        .catch((error) => {
            window.location.replace("/404");
        });
}
function Answer_DB_End(answer, l) {
    let h;
    let m;
    let s;
    s =
        secondes.value >= 10
            ? secondes.value.toString() + "s"
            : "0" + secondes.value.toString() + "s";
    m = minutes.value % 60;
    m = m >= 10 ? m.toString() + "m " : "0" + m.toString() + "m ";
    h = parseInt(minutes.value / 60);
    h = h >= 10 ? h.toString() + "h " : "0" + h.toString() + "h ";
    let time = h + m + s;
    axios
        .post("/answer_question_end", {
            _token: $('meta[name="csrf-token"]').attr("content"),
            question_id: q.value[i.value].id,
            session_id: store.state.session.id,
            answer_text: answer,
            id: l,
            time: time,
        })
        .then((response) => {
            window.location.replace("/");
        })
        .catch((error) => {
            console.log(error);
            //    window.location.replace('/404')
        });
}
function reset_Array() {
    answers.value.splice(0, 4);
    store.state.answers.forEach((answer) => {
        // console.log(answer)
        if (answer.question_id == q.value[i.value].id)
            answers.value.push(answer.text);
    });
}
</script>
<style></style>
