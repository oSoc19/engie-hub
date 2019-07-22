<template>
  <div id="sidebar" class="col-md-3" align="center">
          <div class="nj-card__body">
              <div>
                  <p id="donate">
                      Donate your {{energy}} watts of clean energy to a good cause
                  </p>
              </div>
              <br><hr><br>
              <div>
                  <p>
                      Scan to donate
                  </p>
                  <img id="qr-code" src="/images/qr_code.svg"/>
              </div>
          </div>
    </div>
</template>

<script>

    export default {
        name: 'FinishSidebar',
        props: ['energy']
    }
</script>
<style>
.nj-card__body {
    background-color: #FFFFFF;
    border-color: #CFCECE;
    border-width: 3px;
    border-left-style: solid;
    border-right-style: solid;

    display: flex;
	flex-direction: column;
}
.nj-card__body > div {
    display: flex;
    flex: 1;
    justify-content: center;
    flex-direction: column;
}

#qr-code{
    width: 50%;
}

#donate {
    font-size: 3rem;
    text-align: left;
    line-height: 1.1;
    margin-left: 3rem;
    margin-right: 2rem;
    color: #707070;
}

#rcorners {
  border-radius: 100px;
  padding: 30px 20px;
  width: 150px;
  height: 150px;
}

</style>
