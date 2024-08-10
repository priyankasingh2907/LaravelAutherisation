@extends('Fronts.layouts.app')

@section('content')
<main>
    <section class="section-5 pt-3 pb-3 mb-3 bg-white">
        <div class="container">
            <div class="light-font">
                <ol class="breadcrumb primary-color mb-0">
                    <li class="breadcrumb-item"><a class="white-text" href="#">Home</a></li>
                    <li class="breadcrumb-item">Refund Policy</li>
                </ol>
            </div>
        </div>
    </section>

    <section class=" section-10">
        <div class="container">
            <h1 class="my-3">Refund Policy</h1>
            <h6 class="m-0">Last Update : <span>{{ now() }}</span></h6>
            <br>
            <p>Thank you for shopping with us. We want you to be completely satisfied with your purchase. If for any reason you are not happy with your order, please review our refund policy below.</p>
            <h4>1. Eligibility for Refunds </h4>
            <ul>
                <li>Products: To be eligible for a refund, the product must be unused, in the same condition that you received it, and in its original packaging.</li>
                <li>Returns: Returns must be initiated within [number] days from the date of delivery. If [number] days have passed since your purchase, we unfortunately cannot offer you a refund or exchange.</li>
                <li>Non-Refundable Items: Certain items are non-refundable, including [list any exceptions, e.g., digital downloads, custom-made products, etc.].</li>
            </ul>

            <h4>2. Refund Process </h4>
            <ul>
                <li>Request: To request a refund, please contact us at [contact email or phone number] with your order number and reason for the return.</li>
                <li>Return Shipping: You are responsible for paying the return shipping costs. Shipping costs are non-refundable.</li>
                <li>Inspection: Once we receive your return, we will inspect it and notify you of the approval or rejection of your refund</li>
                <li>Refund Issuance: If approved, your refund will be processed and a credit will be applied to your original method of payment within [number] days.</li>
           </ul>

            <h4>3. Exchanges </h4>
            <ul>
                <li>Products: To be eligible for a refund, the product must be unused, in the same condition that you received it, and in its original packaging.</li>
                <li>Returns: Returns must be initiated within [number] days from the date of delivery. If [number] days have passed since your purchase, we unfortunately cannot offer you a refund or exchange.</li>
                <li>Non-Refundable Items: Certain items are non-refundable, including [list any exceptions, e.g., digital downloads, custom-made products, etc.].</li>
            </ul>
            <h4>4.Cancellation</h4>
            <ul>
                <li>Order Cancellation: If you wish to cancel your order, please contact us immediately at------------. Orders can only be canceled if they have not yet been processed or shipped.</li>
            </ul>
            <h4>5. Contact Us</h4>
            <ul>
                <li>If you have any questions about our refund policy, please contact us at --------.</li>
            </ul>
        </div>
    </section>
</main>
@endsection

@section('customJs')

@endsection