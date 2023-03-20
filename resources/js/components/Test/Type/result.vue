<template>
    <div class="main_test_result w-100" style="height: 55%">
        <div
            class="result_test_image bg-white py-2 px-3 mb-3 rounded-3 w-100"
            style="height: 80% !important; z-index: 1052 !important"
        >
            <img
                :src="'/Images/questions/' + question.image"
                alt=""
                class="h-100 w-100"
                style="object-fit: contain"
            />
        </div>
        <div class="form-input w-100 d-flex justify-content-center">
            <input
                type="text"
                class="h-100 rounded-3 shadow-primary-input border-nor"
                @input="updateValue($event.target.value)"
                :value="modelValue"
                id="Answer"
                name="Answer"
                placeholder="Answer"
                autocomplete="off"
                autofocus
            />
        </div>
    </div>
</template>
<script setup>
import { defineProps, ref } from "vue";
import axios from "axios";
import { useStore } from "vuex";
const store = useStore();
const props = defineProps({
    question: Object,
    modelValue: String,
});
const emit = defineEmits(["update:modelValue"]);
function updateValue(value) {
    emit("update:modelValue", value);
}
</script>
