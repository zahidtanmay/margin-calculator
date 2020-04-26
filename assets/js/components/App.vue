<template>
    <div>
        <h2 class="center">Margin Calculator</h2>
        <div class="center">
            <button @click="addAction()" class="action-button">Add</button>
            <button @click="getMarginProfit()" class="action-button">Calculate Profit</button>
        </div>

        <h4 class="center" v-if="profit">Margin Profit: {{profit}}</h4>

        <template v-for="(action, index) in actionList">
            <div class="wrapper">
                <validation-provider rules="required|positive" v-slot="{errors}">
                    <div class="box">
                        <label for="quantity">Quantity:</label>
                        <input type="number" v-model="action.quantity" :disabled="action.status === 1"/>
                        <div>
                            <span class="error">{{ errors[0] }}</span>
                        </div>

                    </div>
                </validation-provider>

                <validation-provider rules="required|positive" v-slot="{errors}">
                    <div class="box">
                        <label for="price">Price:</label>
                        <input type="number" v-model="action.price" :disabled="action.status === 1" />
                        <div>
                            <span class="error">{{ errors[0] }}</span>
                        </div>

                    </div>
                </validation-provider>


                <template v-if="!action.status">
                <div class="box action-box">

                        <button @click="submitAction(index, 1)" class="submit-button">Buy</button>
                        <button @click="submitAction(index, 2)" class="submit-button">Sell</button>
                </div>
                </template>

                <template v-else>
                    <div class="box action-box">
                        <span class="action-text">{{action.type === 1 ? 'Purchased' : 'Sold'}}</span>
                    </div>
                </template>
            </div>
        </template>

        <div class="center">
            <span class="error">{{responseError}}</span>
        </div>

    </div>
</template>

<script>
    import Vue from 'vue';
    import { ValidationProvider, extend } from 'vee-validate';
    import { required } from 'vee-validate/dist/rules';
    import { getRequest, postRequest } from '../library/requests';

    extend('required', {
        ...required,
        message: 'This field is required',
    });

    extend('positive', value => {
        if (value > 0) {
            return true;
        }

        return 'This field must be a greater than 1';
    });

    export default {
        data() {
            return {
                actionList: [],
                stock: 0,
                profit: '',
                buttonDisabled: false,
                responseError: '',
                inputDisable: true,
            };
        },
        methods: {
            addAction() {
                this.actionList.push({
                    quantity: 1,
                    price: 1,
                    status: 0,
                });
            },
            async submitAction(index, type) {
                Vue.set(this, 'responseError', null);
                const url = '/api/transaction';
                const data = {
                    quantity: parseInt(this.actionList[index].quantity),
                    price: parseInt(this.actionList[index].price),
                    type: type
                };
                const response = await postRequest(url, data);
                if (response.data.status === 'error'){
                    Vue.set(this, 'responseError', response.data.error.message);
                } else {
                    await Vue.set(this.actionList[index], 'status', 1);
                    await Vue.set(this.actionList[index], 'type', type);
                    await this.getStock();
                }
            },
            async getTransactions() {
                const url = '/api/transaction';
                const response = await getRequest(url, {});
                Vue.set(this, 'actionList', response.data);
            },
            async getMarginProfit() {
                const url = '/api/transaction/profit';
                const response = await getRequest(url, {});
                const marginProfit = response.data.marginProfit
                Vue.set(this, 'profit', marginProfit.toString());
            },
        },
        mounted() {
            this.getTransactions();
        },
        components: {
          ValidationProvider,
        },
    };
</script>

<style>
    .center {
        text-align: center;
    }
</style>