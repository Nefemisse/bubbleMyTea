<!-- connection modal -->

@extends('main')

<button type="button" data-bs-toggle="modal" data-bs-target="registration"><i class="fa-solid fa-user"></i></button>
<div class="modal fade" id="registration" tabindex="-1" aria-labelledby="registrationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registrationLabel">Registration</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>On va y arriver</p>
            </div>
            <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal">Close</button>
                <button type="button">Save changes</button>
            </div>
        </div>
    </div>
</div>


<!----------------------------------------------------->

<!-- modify your bubble tea modal -->

<button type="button" data-bs-toggle="modal" data-bs-target="exampleModal"><i class="fa-solid fa-user"></i></button>
<div class="modal fade" id="modify" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modify your bubble tea</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {($bubbleTeaData->img)}
                <hr class="top">
                <div class="modifyBubbleTea">
                    <ul clas="changeToppings">
                        <li><i class="fa-light fa-circle"></i>Tapioca pearls</li>
                        <li><i class="fa-light fa-circle"></i>Coconut jelly</li>
                        <li><i class="fa-light fa-circle"></i>Brown sugar pearls</li>
                        <li><i class="fa-light fa-circle"></i>Sago pearls</li>
                        <li><i class="fa-light fa-circle"></i>Red beans</li>
                    </ul>
                    <ul clas="sugar">
                        <li><i class="fa-light fa-circle"></i>0%</li>
                        <li><i class="fa-light fa-circle"></i>30%</li>
                        <li><i class="fa-light fa-circle"></i>50%</li>
                        <li><i class="fa-light fa-circle"></i>100%</li>
                        <li><i class="fa-light fa-circle"></i>120%</li>
                    </ul>
                </div>
                <hr class="bot">
                <div class="temperature">
                    <li><i class="fa-light fa-circle"></i>Hot?</li>
                    <li><i class="fa-light fa-circle"></i>Cold?</li>
                </div>
                <button>Validate</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Validate</button>
            </div>
        </div>
    </div>
</div>

<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Modify</button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Modify your Bubble tea</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {($bubbleTeaData->img)}
                    <hr class="top">
                    <div class="modifyBubbleTea">
                        <ul clas="changeToppings">
                            <li><i class="fa-light fa-circle"></i>Tapioca pearls</li>
                            <li><i class="fa-light fa-circle"></i>Coconut jelly</li>
                            <li><i class="fa-light fa-circle"></i>Brown sugar pearls</li>
                            <li><i class="fa-light fa-circle"></i>Sago pearls</li>
                            <li><i class="fa-light fa-circle"></i>Red beans</li>
                        </ul>
                        <ul clas="sugar">
                            <li><i class="fa-light fa-circle"></i>0%</li>
                            <li><i class="fa-light fa-circle"></i>30%</li>
                            <li><i class="fa-light fa-circle"></i>50%</li>
                            <li><i class="fa-light fa-circle"></i>100%</li>
                            <li><i class="fa-light fa-circle"></i>120%</li>
                        </ul>
                    </div>
                    <hr class="bot">
                    <div class="temperature">
                        <li><i class="fa-light fa-circle"></i>Hot?</li>
                        <li><i class="fa-light fa-circle"></i>Cold?</li>
                    </div>
                    <button>Validate</button>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Validate</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
</div>
