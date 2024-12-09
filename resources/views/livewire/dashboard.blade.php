<section>
    <div class="px-4 py-12 mx-auto md:px-16 lg:px-32 max-w-5xl">
        <div class="max-w-4xl mx-auto md:max-w-5xl md:w-full">
            <div class="flex flex-col text-center">
                <h1 class="text-4xl font-semibold tracking-tight text-gray-900">
                    HACMAI ELECTION Form
                </h1>
            </div>
            <div class="p-4 mt-8 border bg-gray-50 rounded-3xl">
                <div class="p-8 md:p-12 bg-white border shadow-lg rounded-2xl">
                    <div>
                        <h2 class="text-lg font-medium text-gray-500">
                            <span class="font-bold text-black">Please fill up all the fields.</span>
                        </h2>

                        <!-- Name Fields -->
                        <div class="mt-12 gap-6 lg:columns-3 sm:columns-1">
                            <div class="w-full">
                                <label for="firstname" class="text-sm text-gray-700">First Name <span
                                        class="text-red-600">*</span></label>
                                <input type="text" id="first_name" wire:model.live="first_name"
                                    placeholder="Enter First Name"
                                    class="w-full h-12 px-4 py-2 text-black border rounded-lg appearance-none bg-white border-zinc-300 placeholder-zinc-300 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                @error('first_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-full">
                                <label for="middlename" class="text-sm text-gray-700">Middle Name</label>
                                <input type="text" id="middle_name" wire:model.live="middle_name"
                                    placeholder="Enter Middle Name"
                                    class="w-full h-12 px-4 py-2 text-black border rounded-lg appearance-none bg-white border-zinc-300 placeholder-zinc-300 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                            </div>
                            <div class="w-full">
                                <label for="last_name" class="text-sm text-gray-700">Last Name <span
                                        class="text-red-600">*</span></label>
                                <input type="text" id="last_name" wire:model.live="last_name"
                                    placeholder="Enter Last Name"
                                    class="w-full h-12 px-4 py-2 text-black border rounded-lg appearance-none bg-white border-zinc-300 placeholder-zinc-300 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                @error('last_name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address Field -->
                        <div class="mt-4 gap-6 lg:columns-2 sm:columns-1">
                            <div class="gap-6 lg:columns-2">
                                <div class="w-full">
                                    <label for="blk" class="text-sm text-gray-700">Blk <span
                                            class="text-red-600">*</span></label>
                                    <input type="text" id="blk" wire:model.live="blk"
                                        class="w-full h-12 px-4 py-2 text-black border rounded-lg appearance-none bg-white border-zinc-300 placeholder-zinc-300 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                        placeholder="Enter Blk">
                                    @error('blk')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full">
                                    <label for="lot" class="text-sm text-gray-700">Lot <span
                                            class="text-red-600">*</span></label>
                                    <input type="text" id="lot" wire:model.live="lot"
                                        class="w-full h-12 px-4 py-2 text-black border rounded-lg appearance-none bg-white border-zinc-300 placeholder-zinc-300 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                        placeholder="Enter Lot">
                                    @error('lot')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-full">
                                <label for="street" class="text-sm text-gray-700">Street <span
                                        class="text-red-600">*</span></label>
                                <input type="text" id="street" wire:model.live="street"
                                    class="w-full h-12 px-4 py-2 text-black border rounded-lg appearance-none bg-white border-zinc-300 placeholder-zinc-300 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm"
                                    placeholder="Enter street">
                                @error('street')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <!-- Position Field -->
                        <div class="mt-4">
                            <label for="position" class="text-sm text-gray-700">Position <span
                                    class="text-red-600">*</span></label>
                            <select id="position" wire:model.live="position"
                                class="w-full h-12 px-4 py-2 text-black border rounded-lg appearance-none bg-white border-zinc-300 placeholder-zinc-300 focus:border-blue-500 focus:outline-none focus:ring-blue-500 sm:text-sm">
                                <option value="">Select Position</option>
                                <option value="President">President</option>
                                <option value="Vice President">Vice President</option>
                                <option value="Secretary">Secretary</option>
                                <option value="Treasurer">Treasurer</option>
                                <option value="Auditor">Auditor</option>
                            </select>
                            @error('position')
                                <span class="text-red-500 text-sm">Please choose one!</span>
                            @enderror
                        </div>

                        <!-- Qualifications -->
                        <div class="flex flex-col gap-4 mt-4">
                            <label for="position" class="text-sm text-gray-700 flex items-center gap-2">
                                Qualifications: <span class="text-red-600">*</span>
                                @error('qualifications')
                                    <span class="text-red-500 text-sm">Please choose atleast one!</span>
                                @enderror
                            </label>

                            <div>
                                <input type="checkbox" id="qualification1" value="Must be of legal age"
                                    wire:model="qualifications" class="mr-2">
                                <label for="qualification1" class="text-sm text-gray-700">Must be of legal age</label>
                            </div>
                            <div>
                                <input type="checkbox" id="qualification2" value="Must be in good standing"
                                    wire:model="qualifications" class="mr-2">
                                <label for="qualification2" class="text-sm text-gray-700">Must be in good
                                    standing</label>
                            </div>
                            <div>
                                <input type="checkbox" id="qualification3"
                                    value="Must be an actual resident of Courtyard of Maia Alta for at least six (6) months as certified by the association secretary"
                                    wire:model="qualifications" class="mr-2">
                                <label for="qualification3" class="text-sm text-gray-700">Must be an actual resident
                                    of Courtyard of Maia Alta
                                    for at least six (6) months as certified by the association secretary</label>
                            </div>
                            <div>
                                <input type="checkbox" id="qualification4"
                                    value="Has not been convicted by final judgement of an offense involving moral turpitude"
                                    wire:model="qualifications" class="mr-2">
                                <label for="qualification4" class="text-sm text-gray-700">Has not been convicted by
                                    final judgement of an
                                    offense involving moral turpitude</label>
                            </div>
                            <div>
                                <input type="checkbox" id="qualification5"
                                    value="Legitimate Spouse of a member may be a candidate in lieu of the member - in accordance with the provisions of Rule 9 of Implementing Rules and Regulations of Magna Carta for Homeowners and Homeowners Associations"
                                    wire:model="qualifications" class="mr-2">
                                <label for="qualification5" class="text-sm text-gray-700">Legitimate Spouse of a
                                    member may be a candidate in
                                    lieu of the member - in accordance with the provisions of Rule 9 of Implementing
                                    Rules and Regulations of
                                    Magna Carta for Homeowners and Homeowners Associations</label>
                            </div>
                        </div>


                        <!-- Submit and Print Button -->
                        <div class="mt-8 text-center">
                            <button type="button" wire:click="generatePdf"
                                class="px-6 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:outline-none w-36">
                                <span wire:loading.remove wire:target="generatePdf">Print to PDF</span>
                                <span wire:loading wire:target="generatePdf">
                                    <svg class="inline w-5 h-5 mr-2 text-white animate-spin"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10"
                                            stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                        </path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
