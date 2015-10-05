function r = getTargetPos(imgPath)
	r = [25,25; 0,0; 50,0; 0,50; 50,50];
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: getTargetPos
%
% Called From: doVideoAnalysis, doImageAnalysis, getRings.
% Returns: An array of [x,y] positions where array[0] is the center and array[1-4] are the 4 corners.
% Description: Finds the 4 corners of the target and returns them.
%
% PSEUDOCODE:
%
% getTargetPos(img):
% 	return [[x0,y0],[x1,y1],[x2,y2],[x3,y3],[x4,y4]]		# Returns x,y values of the center & each corner of the target.
