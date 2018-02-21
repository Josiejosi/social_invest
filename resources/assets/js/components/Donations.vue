<template>
    <div class="table-responsive" >
        <table class="table table-bordered table-lg table-v2 table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="transaction in transactions" v-if="should_show( transaction.donee_id )">
                    <td class="text-left"> {{ transaction.name }} </td>
                    <td class="text-right"> $ {{ transaction.growth_amount }} USD</td>

                    <td  class="text-center" v-if="transaction.deposit_type == 'Both'">
                        <i class="fab fa-ethereum"></i> OR <i class="fab fa-btc"></i>
                    </td>

                    <td  class="text-center" v-if="transaction.deposit_type == 'BTC'">
                        <i class="fab fa-btc"></i>
                    </td>

                    <td  class="text-center" v-if="transaction.deposit_type == 'ETH'">
                        <i class="fab fa-ethereum"></i>
                    </td>

                    <td class="row-actions" v-if="transaction.status == 0">
                        <a :href="transaction.url" 
                           class="btn btn-success btn-sm">
                            <i class="far fa-money-bill-alt"></i> Contribute
                        </a>
                    </td>

                    <td class="row-actions" v-if="transaction.status == 1">

                        <a href="#" class="btn btn-warning btn-sm">
                            <i class="fas fa-lock"></i></i> Processing
                        </a>

                    </td>

                    <td class="row-actions" v-if="transaction.status == 2">

                        <a href="#" class="btn btn-info btn-sm">
                            <i class="fas fa-lock"></i></i> Awating Confirmation
                        </a>

                    </td>
                </tr>

                <tr v-if="transactions.length == 0"  class="text-center">
                    <td colspan="4">Sorry the list is currently empty, please try again later.</td>
                </tr>

            </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                transactions: {},
                user_id: "",
            };
        },

        methods: {

            should_show( donee_id ) {

                if ( this.user_id == donee_id ) 
                    return false ;
                else 
                    return true ;

            },

            load_donation_list() {

                axios.get( '/list_transactions' ).then( response => this.transactions = response.data ) ;

            },

            latest_transaction() {

                Echo.channel( 'latest-transactions' )

                    .listen('LatestTransactions', (e) => {

                        this.transactions = e.latest_transaction ;

                    });
            },
        },

        mounted() {

            this.load_donation_list() ;
            this.latest_transaction() ;

            $('#flash-overlay-modal').modal() ;
            $('div.alert').not('.alert-important').delay(6000).fadeOut(350) ;

            this.user_id = document.head.querySelector( "[name=active]" ).content ;
            
        }
    }
</script>
