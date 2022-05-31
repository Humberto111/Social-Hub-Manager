<x-layout>
    <div class="mx-auto py-20 mt-12 bg-gray-200 w-3/5 border-solid border-4 border-blue-500">
        <div class="mb-12 text-center text-3xl">
            <h1>Set up Google Authenticator</h1>
        </div>
        <div class="mb-12 text-center">
            <p>Set up your two factor authentication by scanning the barcode below. Alternatively, you can use the code <STRONG>{{ $secret }}</STRONG></p>
        </div>

        <div class="mb-12 flex justify-center">
                <?php echo $QR_Image;  ?>
        </div>
        <div class="mb-12 text-center">
            <p>You must set up your Google Authenticator app before continuing. You will be unable to login otherwise</p>
        </div>
        <div  class="mb-2 text-center">
            <a class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5" href="/completeRegister"><button class="btn-primary">Complete Registration</button></a>
        </div>
    </div>    
</x-layout>