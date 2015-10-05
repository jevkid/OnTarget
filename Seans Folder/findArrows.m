function r = findArrows(imgPath)
	r = [39,28; 41,31; 25,24];
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: findArrows
%
% Called From: doVideoAnalysis, doImageAnalysis.
% Returns: An array of arrow point positions.
% Description: Takes a picture of 1 or more arrows and determines the point at which they meet the target.
%
% PSEUDOCODE:
%
% findArrows(img):
% 	for i in xrange(0,count(arrows)):
% 		#
% 	return arrows