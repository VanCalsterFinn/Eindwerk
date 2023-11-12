@extends('layouts.app')
@extends('layouts.topbar')
@section('content')

<div class="flex justify-center items-center flex-col w-full">
    <div class="flex justify-center flex-col">
        
        <div class="flex justify-between items-center w-full mb-4">
            <p class="font-bold text-2xl">Stock item: 2309124589</p>
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
                            <p class="font-bold">Status: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Last Updated: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="font-bold">Last Stocktake: </p>
                            <input type="text" class="border-2 border-slate-200 rounded">
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
                    <input type="submit" value="Update" id="update" class="w-full p-2 bg-blue-700 text-white cursor-pointer rounded">
                </div>
            </form>
            

        </div>

    </div>

</div>

@endsection