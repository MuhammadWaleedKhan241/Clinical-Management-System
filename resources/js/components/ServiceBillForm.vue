<template>
<div>
    <form class="form-horizontal form-material" @submit.prevent="submitForm">
        <div class="form-group">
            <div class="col-md-12 mb-3">
                <label for="service_id" class="form-label">Select Service</label>
                <select class="form-control" v-model="form.service_id" required>
                    <option value="" disabled selected>Select a service</option>
                    <option v-for="service in services" :key="service.id" :value="service.id">{{ service.name }}
                    </option>
                </select>
            </div>

            <div v-if="form.service_id" id="serviceDetails">
                <div class="col-md-12 mb-3">
                    <label for="payment_type" class="form-label">Payment Type</label>
                    <select class="form-control" v-model="form.payment_type" required>
                        <option value="" disabled selected>Select payment type</option>
                        <option value="cash">Cash</option>
                        <option value="credit_card">Credit Card</option>
                        <option value="debit_card">Debit Card</option>
                    </select>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="invoice_no" class="form-label">Invoice Number</label>
                    <input type="text" class="form-control" v-model="form.invoice_no" placeholder="Enter invoice number" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="service_amount" class="form-label">Service Amount</label>
                    <input type="number" step="0.01" class="form-control" v-model="form.service_amount" placeholder="Enter service amount" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="doctor_referred" class="form-label">Doctor Referred</label>
                    <input type="text" class="form-control" v-model="form.doctor_referred" placeholder="Enter doctor's name">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="service_name" class="form-label">Service Name</label>
                    <input type="text" class="form-control" v-model="form.service_name" placeholder="Enter service name">
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <label for="patient_id" class="form-label">Select Patient</label>
                <select class="form-control" v-model="form.patient_id" required>
                    <option value="" disabled selected>Select a patient</option>
                    <option v-for="patient in patients" :key="patient.id" :value="patient.id">{{
                            patient.patient_name }}</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info waves-effect">Save</button>
            <button type="button" class="btn btn-danger waves-effect" @click="closeModal">Cancel</button>
        </div>
    </form>
</div>
</template>

<script>
export default {
    name: "ServiceBillForm",
    props: {
        services: Array,
        patients: Array,
    },
    data() {
        return {
            form: {
                service_id: "",
                payment_type: "",
                invoice_no: "",
                service_amount: "",
                doctor_referred: "",
                service_name: "",
                patient_id: "",
            },
        };
    },
    methods: {
        submitForm() {
            // Handle form submission, e.g., via axios
        },
        closeModal() {
            // Close the modal
            this.$emit('close');
        }
    },
};
</script>

<style scoped>
/* Add your styles here */
</style>
