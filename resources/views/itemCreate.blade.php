@extends('layouts.app')
@extends('layouts.topbar')
@section('content')

<div class="flex justify-center items-center flex-col w-full">
    <div class="flex justify-center flex-col">
        
        <div class="flex justify-between items-center w-full mb-4">
            <p class="font-bold text-2xl">Add part</p>
        </div>

        <div class="flex justify-center flex-col shadow p-4 rounded">
            <form action="" method="PUT">
                <div class="flex justify-center items-center gap-4">

                    <div class="flex justify-center flex-col gap-4">
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Image: </p>
                            <input type="file" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Base part: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Quantity: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Category: </p>

                            <div class="flex">
                                <a class="p-2 bg-blue-700 text-white cursor-pointer rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                                <select name="category_id" id="">
                                    <option>Connectors</option>
                                    <option>Interface</option>
                                    <option>MCU</option>
                                    <option>Capacitor</option>
                                    <option>Inductors</option>
                                    <option>Relais</option>
                                    <option>PCB</option>
                                    <option>PCBA</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Location: </p>
                            <select name="location_id" id="">
                                <option>R1S1</option>
                                <option>R1S2</option>
                                <option>R1S3</option>
                                <option>R1S4</option>
                                <option>R1S5</option>
                                <option>R1S6</option>
                                <option>R1S7</option>
                                <option>R1S8</option>
                                <option>R2S1</option>
                                <option>R2S2</option>
                                <option>R2S3</option>
                                <option>R2S4</option>
                                <option>R2S5</option>
                                <option>R2S6</option>
                                <option>R2S7</option>
                                <option>R2S8</option>
                                <option>PrinterS1</option>
                                <option>PrinterS2</option>
                                <option>PrinterS3</option>
                                <option>PrinterS4</option>
                                <option>PrinterS5</option>
                            </select>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Packaging: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Manufacturer: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Manufacturer Part: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Supplier: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Supplier Part: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Description: </p>
                            <textarea class="border-2 border-slate-200 rounded" name="description" cols="40" rows="5"></textarea>
                        </div>


                    </div>
                </div>
                <div class="flex mt-4 hover:opacity-80">
                    <input type="submit" value="Add" id="add" class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
                </div>
            </form>
            

        </div>

    </div>

</div>

@endsection