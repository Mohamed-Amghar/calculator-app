

    <template>
         <div>
            <h1>Simple Calculator</h1>
            <form @submit.prevent="submitForm">
                <input type="number" v-model="operand1" placeholder="Operand 1" required>
                <select v-model="operation" id="chose" required>
                    <option value="plus">+</option>
                    <option value="minus">-</option>
                    <option value="multiply">*</option>
                    <option value="divide">/</option>
                </select>
                <input type="number" v-model="operand2" placeholder="Operand 2" required>
                <button type="submit">Calculate</button>
            </form>
            <h2 v-if="result">Result: {{ result }}</h2>
        </div>
    </template>

    <script setup>
    import { ref } from 'vue';

    // Define reactive variables using the 'ref' function
    const operand1 = ref('');        // Holds the value of the first operand
    const operand2 = ref('');        // Holds the value of the second operand
    const operation = ref('');       // Holds the selected operation (e.g., '+', '-', '*', '/')
    const result = ref('');          // Holds the calculated result of the operation


    
    // Define the submitForm function, which handles form submission
    const submitForm = async () => {
        try {
            // Send a POST request to the '/calculate' endpoint
            const response = await fetch('/calculate', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                // Send the form data as JSON in the request body
                body: JSON.stringify({ operand1: operand1.value, operand2: operand2.value, operation: operation.value })
            });

            // Parse the JSON response
            const data = await response.json();
            console.log(data);

            // Update the 'result' variable with the calculated result from the response
            result.value = data.result;
        } catch (error) {
            // Handle errors by logging them and setting the 'result' variable to 'Error'
            console.error(error);
            result.value = 'Error';
        }
    };
    </script>

    <style src="../../css/style.css"></style>