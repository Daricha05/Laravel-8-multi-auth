<x-app-layout>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="w-100 mx-auto">
                        <h2 class="float-left">Liste de descendants devennant majeur</h2>
                    </div>
                    <div class="w-100 mx-auto pt-3 table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-inverse">
                                <tr>
                                    <th>Noms et Prénoms</th>
                                    <th>Date de naissance</th>
                                    <th>Sexe</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($notifications as $notification)
                                    @foreach($descendents as $descendent)
                                        @if($notification->descendent_id == $descendent->id)
                                            <tr>
                                                <td class="align-middle">{{ $descendent->Noms." ".$descendent->Prenoms }}</td>
                                                <td class="align-middle">{{ $descendent->DateN }}</td>
                                                <td class="align-middle">{{  ucfirst($descendent->Sexe) }}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

        $maj = ['etat' => 'vue',];


        foreach ($notifications as $notification)
        {
            DB::table('notifications')
                ->where('id',$notification->id)
                ->update($maj);
        }
    ?> 
</x-app-layout>