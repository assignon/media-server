<div class="tools">

    <img src="" alt="" id="addNote">

    <div class="toolsHeader">

      <div class="modes">

         <h3>What's up?</h3>
         <p>"Collective mode"</p>
         <p>"Private mode"</p>

      </div>

      <img src="../mediaServer/public/media/tools/micro.svg" alt="" id="micro">

    </div>

</div>


<style media="screen">

.tools
{

   width: 75%;
   height: 28%;
   display: flex;
   flex-direction: row;
   justify-content: space-between;
   align-items: center;
   margin-top: 15px;

}



#addNote
{

    height: 100%;
    width: 200px;
    border: 1px solid #E9C53C;
    background-color: #E9C53C;
    cursor: pointer;

}


.toolsHeader
{

   width: 75%;
   height: 100%;
   display: flex;
   flex-direction: column;
   justify-content: space-around;
   align-items: center;
   border: 1px solid gray;
   border-radius: 5px;
   background-color: white;
   position: relative;
   left: 100px;

}


.modes
{

   width: 100%;
   height: 50%;
   display: flex;
   flex-direction: column;
   justify-content: space-between;
   align-items: flex-start;

}


.modes h3
{

   text-align: center;
   color: #2D3C77;
   margin: 0px;
   width: 100%;

}


.modes p
{

   text-align: left;
   font-size: 15px;
   color: #2D3C77;
   margin: 0px;
   margin-left: 5px;

}


.modes p:last-child
{

   margin-left: 30px;

}


#micro
{

   width: 20px;
   height: 20px;
   border: 1px solid #F65F59;
   border-radius: 100%;
   padding: 10px;
   background-color: #F65F59;
   cursor: pointer;

}


</style>
