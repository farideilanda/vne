              <form name="newsletter_subscription" ng-submit="mainctrl.newsletter(newsletter)">
                <div class="col l6 s12 m12 mg-margin-top-0 input-field contrast-input mg-padding-0 mg-padding-left-0">
                      <input type="email" required placeholder="E-Mail" ng-model="newsletter.newsletter_email" ng-pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-z]{2,8}$/">
                </div>
                <div class="col l2 s12 m12 mg-margin-top-0 mg-padding-0">
                     <button type="submit" ng-disabled="newsletter_subscription.$invalid || mainctrl.is_newsletter_subscribing" class="btn mg-height-48 orange white-text mg-padding-top-5 bold mg-width-100-perc">Soumettre</a>
                </div>
              </form>